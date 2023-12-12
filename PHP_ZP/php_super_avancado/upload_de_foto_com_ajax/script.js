$(function(){

	$('button').on('click', function(){		// ultilizando a ação de 'click' do button
		var data = new FormData();		// criação do 'formData' vazio

		var arquivos = $('#foto')[0]. files;		// verificando se tem arquivos seleçionados

		if(arquivos. length > 0) {

			data.append('nome', $('#nome').val());		// adiçionando 'nome' dentro do formData

			data.append('foto', arquivos[0]);		// adiçionando o arquivo 'foto'

			$.ajax({		// fazendo uma requisição via 'ajax'
				type:'POST',
				url:'recebedor.php',
				data:data,
				contentType:false,
				processData:false,
				success:function(msg){
					alert(msg);
				}
			});
		}
	});

});