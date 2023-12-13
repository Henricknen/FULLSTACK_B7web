<html>
<head>
	<script type = "text/javascript" src = "js/jquery.min.js"></script>		<!-- adiçionando 'jquery' pra ele fazer as requisições e verificar se tem notificação nova -->
	<script type = "text/javascript" src = "js/script.js"></script>
	<style type = "text/css">
	.notificacoes {
		width:30px;
		height:30px;
		background-color:#CCC;
		text-align:center;
		line-height:30px;
		color:#000;
		font-size:16px;
	}
	.tem_notif {	/* se tiver notificação */
		background-color:#FF0000;
		color:#FFF;
	}
	</style>
</head>
<body>

	<div class = "notificacoes">0</div>		<!-- verifica notificações -->

	<hr/>

	<button class = "addNotif">Criar notificação</button>

</body>
</html>