$('document').ready(function(){


    $('a.more').click( e => {

        $(e.target).parents('tr').next('tr.detail').toggleClass('hide');
    });


    $('.anotacao').blur(function(e) {

        let conteudo = $(e.target).data('conteudo');
        let conteudoNovo = $(this).html();
        if(conteudo !== conteudoNovo) {

            let fileName = $(e.target).parents('tr').data('name');

            $.ajax({
                url: "do.php",
                type:'POST',
                data: { action : "ANOTACAO", fileName: fileName, anotacao :  conteudoNovo},
                cache: false,
                success: function(r){
                  if(r === 'OK') {
                      location.reload();
                  }
                }
              });




        }

    });

    


});