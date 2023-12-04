$(function(){

	$('.modal_ajax'). on('click', function(e) {		// adiçionando 'evento' de click
		e. preventDefault();		// 'preventDefault' previni a ação natural de click

		$('.modal'). html('Carregando...');		// abri o 'modal'
		$('.modal_bg'). show();

		var link = $(this). attr('href');		// pegando o atributo 'href' dos links

		$.ajax({		// carregando o conteúdo dos 'href' via ajax
			url:link,
			type:'GET',
			success:function(html){		// reçebendo o 'html'
				$('.modal'). html(html);		// adiçionando o 'html' dentro de modal
			}
		});
	});

});