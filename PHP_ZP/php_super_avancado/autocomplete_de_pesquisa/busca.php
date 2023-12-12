<?php
try {
	$pdo = new PDO("mysql:dbname=autocomplete;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ". $e-> getMessage();
	exit;
}

$array = array();

if(!empty($_POST['texto'])) {		// se texto 'foi' enviado e não está 'vazio'
	$texto = $_POST['texto'];

	$sql = "SELECT * FROM pessoas WHERE nome LIKE :texto";		// consulta na tabela 'pessoas' do bd 
	$sql = $pdo-> prepare($sql);
	$sql-> bindValue(":texto", '%'. $texto. '%');		// '%' encontra o palavra no começo, meio ou no fim
	$sql-> execute();

	if($sql-> rowCount() > 0) {		// se encontrar os resultados

		foreach($sql-> fetchAll() as $pessoa) {
			$array[] = array('nome'=> utf8_encode($pessoa['nome']), 'id'=> $pessoa['id']);		// salvando o 'nome' da pessoa com o 'id'
		}

	}

}

echo json_encode($array);		// transformando o array em 'json'