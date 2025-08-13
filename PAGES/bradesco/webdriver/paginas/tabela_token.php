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

$sql = mysqli_query($ConnectDB, "SELECT * FROM tabela_token WHERE conta = '" . $row_Cliente['agencia'] . "' ORDER BY id DESC");

while ($row = mysqli_fetch_array($sql)) {
    echo '<tr  style="text-transform: uppercase;">
    <th scope="col">#</th>
    <th scope="col">' . $row["datahora"] . '</th>
    <th scope="col">' . $row["tipo"] . '</th>
    <th scope="col">' . $row["token"] . '</th>
</tr>';
}
