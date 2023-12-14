function pegarAulas(obj) {
	var item = obj.value;		// pegando oitem que está seleçionado e salvando na variável 'item'

	$. ajax({		// requisição 'ajax'
		url:BASE_URL + "home/pegar_aulas",
		type:'POST',
		data:{modulo:item},
		dataType:'json',
		success:function(json) {
			var html = '';		// 'html' vazio que será populado com todas as opções que tem

			for(var i in json) {
				html += '<option value="' + json[i]. id + '">' + json[i]. titulo + '</option>';
			}

			$("#aulas"). html(html);
		}
	});
}