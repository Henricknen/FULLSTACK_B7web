<form method="POST">		<!-- formulário simples -->
	Qual seu nome?<br/>
	<input type="text" name="nome" /><br/>
	<input type="submit" value="Enviar" />
</form>

<?php
if(!empty($_POST['nome'])) {		// verificando se campo ' do formulário não está vazio'
	echo "Seja Bem Vindo(a), ".$_POST['nome'];
}
?>