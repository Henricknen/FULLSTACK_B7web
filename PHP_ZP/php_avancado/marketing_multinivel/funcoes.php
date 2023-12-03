<?php

function listar($id, $limite) {
	$lista = array();        // lista iniçia como um 'array vazio'
	global $pdo;

	$sql = $pdo-> prepare("SELECT 
		usuarios.id, usuarios.id_pai, usuarios.patente, usuarios.nome, 
		patentes.nome as p_nome 
		FROM usuarios LEFT JOIN patentes ON patentes.id = usuarios.patente
		WHERE usuarios.id_pai = :id");     // pegando dados espeçificos "usuarios.id, usuarios.id_pai, usuarios.patente, usuarios.nome, patentes.nome"
	$sql-> bindValue(":id", $id);
	$sql-> execute();

	if($sql-> rowCount() > 0) {
		$lista = $sql-> fetchAll(PDO::FETCH_ASSOC);		// 'PDO::FETCH_ASSOC' evita que os itens seja repetidos

		foreach($lista as $chave=> $usuario) {
			$lista[$chave]['filhos'] = array();

			if($limite > 0) {
				$lista[$chave]['filhos'] = listar($usuario['id'], $limite - 1);		// enquanto '$limite' for maior que 0 pega os itens 'filhos' dos cadastrados e diminui 1 '$limite'
			}
		}
	}

	return $lista;
}

function exibir($array) {		// função reçenendo'$array' como parâmetro que são os contatos
	echo '<ul>';
	foreach($array as $usuario) {
		echo '<li>';
		echo $usuario['nome']. ' (' .$usuario['p_nome']. ')';

		if(count($usuario['filhos']) > 0) {		// se usuário logado tiver 'itens filhos' serão exibidos
			exibir($usuario['filhos']);
		}

		echo '</li>';
	}
	echo '</ul>';
}