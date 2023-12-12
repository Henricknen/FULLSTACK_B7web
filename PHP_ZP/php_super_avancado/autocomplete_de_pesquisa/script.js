$(function(){

	$('#busca').on('keyup', function(){		// evento de 'keyup' faz com que ao soltar a letra 'tecla' a busca ocorrerá
		var texto = $(this). val();		// ao soltar a tecla 'pega' o texto que foi digitado

		$.ajax({		// 'requisição' ajax
			url:'busca.php',
			type:'POST',
			dataType:'json',		// retorna 'json'
			data:{texto:texto},
			success:function(json) {
				var html = '';

				for(var i in json) {
					html += '<li><a href="usuario.hp?id='+json[i]. id + '">' + json[i]. nome + '</a></li>';		// transformando a 'busca encontrada' em um link
				}

				$('#resultado'). html(html);
			}
		});
	});

});