function verificarNotificacao() {		// função faz uma requisição 'ajax'

	$.ajax({
		url:'verificar.php',		// arquivo 
		type:'POST',
		dataType:'json',
		success:function(json) {

			if(json. qt > 0) {		// se tiver notificação
				$('.notificacoes'). addClass('tem_notif');		// se tiver noticações passa  a classe 'tem_notif' como parâmetro
				$('.notificacoes'). html(json. qt);
			} else {
				$('.notificacoes'). removeClass('tem_notif');
				$('.notificacoes'). html('0');
			}

		}
	});

}

$(function() {		// função reverte a função 'verificarNotificacao' a cada 2 segundos
	setInterval(verificarNotificacao, 2000);
	verificarNotificacao();

	$('.notificacoes'). on('click', function() {

	});

	$('.addNotif'). on('click', function() {
		$. ajax({
			url:'add.php'
		});
	});















});