<?PHP
include("../webdriver/conexao.php");

if (!empty($_POST['usuario'])) {
    if (!empty($_POST['senha'])) {
        function anti_sql_injection($string)
        {
            include("../webdriver/conexao.php");
            $string = stripslashes($string);
            $string = strip_tags($string);
            $string = mysqli_real_escape_string($ConnectDB, $string);
            return $string;
        }

        $sql = mysqli_query($ConnectDB, "select * from admin where usuario='" . anti_sql_injection($_POST['usuario']) . "' and senha='" . anti_sql_injection($_POST['senha']) . "' limit 1") or die("Erro ao processar autenticação");
        $linhas = mysqli_num_rows($sql);
        if ($linhas == '') {
            session_start();
            $_SESSION['msg'] = "<div class='alert alert-danger icons-alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <i class='icofont icofont-close-line-circled'></i>
        </button>
        <p><strong>Erro!</strong> Usuário ou senha incorreto.</p>
        </div>";
            header("Location: ./login.php?raid=" . rand(0, 999999999999999) . "");
            exit();
        } else {
            while ($dados = mysqli_fetch_assoc($sql)) {
                session_start();
                $_SESSION['nome_usu_sessao'] = $dados['usuario'];
                header("Location: ./?raid=" . rand(0, 999999999999999) . "");
            }
        }
    } else {
        session_start();
        $_SESSION['msg'] = "<div class='alert alert-danger icons-alert'>
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		<i class='icofont icofont-close-line-circled'></i>
		</button>
		<p><strong>Erro!</strong> Campo *senha vazio, revise o campo por favor.</p>
		</div>";
        header("Location: ./login.php?raid=" . rand(0, 999999999999999) . "");
    }
} else {
    session_start();
    $_SESSION['msg'] = "<div class='alert alert-danger icons-alert'>
	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	<i class='icofont icofont-close-line-circled'></i>
	</button>
	<p><strong>Erro!</strong> Campo *usuário vazio, revise o campo por favor.</p>
	</div>";
    header("Location: ./login.php?raid=" . rand(0, 999999999999999) . "");
}
