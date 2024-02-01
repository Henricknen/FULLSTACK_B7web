$(function(){       // função que será executada quando a página terminar de carregar

    $.ajax({
        url: 'https://api.b7web.com.br/cinema/',         // url da API que fornece informações sobre filmes
        type: 'GET',
        dataType: 'json',

        beforeSend: function(){
            $('.filmes').html('<div class="col-md-12">Carregando...</div>');
        },

        success: function(json) {
            
            var html = '';      // string vazia para armazenar os elementos de filme

            for(var i in json) {
                            // Adiciona um bloco de 'html' para cada filme, utilizando os dados do JSON
                html += '<div class="col-md-4"><div class="filme"><img src="'+ json[i].avatar+ '" />'+ json[i].titulo+ '</div></div>';
            }

            $('.filmes'). html(html);    // substitui o conteúdo da classe 'filmes' pelo html criado
        }
    });

});
