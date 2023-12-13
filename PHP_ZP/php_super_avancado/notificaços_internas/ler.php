<?php
try {
	$pdo = new PDO("mysql:dbname=projeto_notificaçoes_internas;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e-> getMessage();
	exit;
}

$sql = "SELECT * FROM notificacoes WHERE id_user = '1'";
$sql = $pdo-> query($sql);

if($sql->rowCount() > 0) {		// verificando se ha notificações
	foreach($sql-> fetchAll() as $item) {

		$propriedade = json_decode($item['propriedade']);		// transformando um texto em forma de 'json' e transformando em um 'array'

		if($item['notificacao_tipo'] == 'MSG') {
			echo $propriedade-> msg. "<br/>";
		}
		elseif($item['notificacao_tipo'] == 'CURTIDA') {
			echo $propriedade-> curtidor. " curtiu a foto ". $propriedade-> id_foto. "<br/>";
		}
		echo "<hr/>";

	}
}