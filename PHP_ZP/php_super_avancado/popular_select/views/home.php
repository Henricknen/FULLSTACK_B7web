<form method = "POST">
	Escolha o módulo:<br/>
	<select name = "modulos" id = "modulos" onchange = "pegarAulas(this)">		<!-- ação do js 'onchange' -->
		<option></option>		<!-- Para iniçiar em 'branco' -->
		<?php foreach($modulos as $modulo): ?>
		<option value = "<?php echo $modulo['id']; ?>"><?php echo $modulo['titulo']; ?></option>		<!-- preenchendo o foreach com os itens do banco de dados -->
		<?php endforeach; ?>
	</select><br/><br/>

	Escolha a aula:<br/>
	<select name = "aulas" id = "aulas">

	</select><br/><br/>

	<input type = "submit" value = "Enviar" />
</form>