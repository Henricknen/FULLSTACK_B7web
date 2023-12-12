<?php
if(isset($_FILES['foto'])) {		// verificando se reçebeu o arquivo 'foto'

	$arquivo = $_FILES['foto'];
	move_uploaded_file($arquivo['tmp_name'], 'fotos/'.$arquivo['name']);		// enviando, salvando o arquivo na pasta 'fotos'

	echo "Arquivo de ". $_POST['nome']. " enviado com sucesso!";

}

?>