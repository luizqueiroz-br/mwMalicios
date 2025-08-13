$('document').ready(function(){


    $('a.excluirTodos').click( e => {
        e.preventDefault();
        let confirma = confirm('Você tem Certeza?');
        if(!confirma) {
            return false;
        }
        $.ajax({
            url: "do.php",
            type:'POST',
            data: { action : 'EXCLUIR_TODOS_ACESSOS'},
            cache: false,
            success: function(r){
                location.reload();
            }
        });

    });
});