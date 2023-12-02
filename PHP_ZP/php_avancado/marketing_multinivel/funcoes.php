<?php

function listar($id) {
	$lista = array();        // lista iniçia como um 'array vazio'
	global $pdo;

	$sql = $pdo-> prepare("SELECT * FROM usuarios WHERE id_pai = :id");     // pegando informações 'itens' cadastrados pelo usuário logado
	$sql-> bindValue(":id", $id);
	$sql-> execute();
	if($sql-> rowCount() > 0) {
	$lista = $sql-> fetchAll(PDO::FETCH_ASSOC);		// 'PDO::FETCH_ASSOC' evita que os itens seja repetidos

	foreach($lista as $chave=> $usuario) {
		$lista[$chave]['filhos'] = listar($usuario['id']);		// pegando os filhos dos 'itens' cadastrados
	}
}

	return $lista;
}

// function exibir($array) {
// 	echo '<ul>';
// 	foreach($array as $usuario) {
// 		echo '<li>';
// 		echo $usuario['nome'].' ('.$usuario['p_nome'].')';

// 		if(count($usuario['filhos']) > 0) {
// 			exibir($usuario['filhos']);
// 		}

// 		echo '</li>';
// 	}
// 	echo '</ul>';
// }












