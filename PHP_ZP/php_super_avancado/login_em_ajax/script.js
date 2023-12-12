$(function(){

	$('#form'). on('submit', function(e) {
		e. preventDefault();		// 'preventDefault' impede que a ação 'padrão' aconteça e que o formulário seja enviado

		var email = $('input[name=email]'). val();		// pegando 'email' e 'senha'
		var senha = $('input[name=password]'). val();

		$.ajax({		// fazendo uma 'requisição' ajax
			type:'POST',
			url:'login.php',
			data:{email:email, senha:senha},
			success:function(msg) {
				alert(msg);
			}
		});

	});

});