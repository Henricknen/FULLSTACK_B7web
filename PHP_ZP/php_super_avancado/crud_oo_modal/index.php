<?php
include 'contato.class.php';
$contato = new Contato();
?>

<html>
<head>
	<title>Site de contatos</title>		<!-- título do sistema -->
	<link rel = "stylesheet" href = "assets/css/estilo.css" type = "text/css" />		<!-- puchando o 'css', 'jquery' e 'js' -->
	<script type = "text/javascript" src = "assets/js/jquery.min.js"></script>
	<script type = "text/javascript" src = "assets/js/script.js"></script>
</head>
<body>

<h1>Contatos</h1>

<a href = "adicionar.php" class = "modal_ajax">[ ADICIONAR ]</a><br/><br/>		<!-- adiçionando 'modal_ajax' ao clicar no botão adiçionar -->

<table border = "1" width = "600">
	<tr>
		<th>ID</th>
		<th>NOME</th>
		<th>E-MAIL</th>
		<th>AÇÕES</th>
	</tr>

	<?php
	$lista = $contato->getAll();
	foreach($lista as $item):
	?>
	<tr>
		<td><?php echo $item['id']; ?></td>
		<td><?php echo $item['nome']; ?></td>
		<td><?php echo $item['email']; ?></td>
		<td>
			<a href = "editar.php?id = <?php echo $item['id']; ?>" class = "modal_ajax">[ EDITAR ]</a>
			<a href = "excluir.php?id = <?php echo $item['id']; ?>">[ EXCLUIR ]</a>
		</td>
	</tr>
	<?php endforeach; ?>

</table>

<div class = "modal_bg">		<!-- criando 'modal' primeira 'div' escureçe toda a tela -->
	<div class = "modal">		<!-- a segunda é REALMENTE o modal -->
		
	</div>
</div>



















</body>
</html>