<?php
try {
	$pdo = new PDO("mysql:dbname=projeto_notificaçoes_internas;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ".$e-> getMessage();
	exit;
}

$prop = array(
	'curtidor' => '2',
	'id_foto' => '123'
);

$sql = "INSERT INTO notificacoes (id_user, notificacao_tipo, propriedade, link) VALUES (:id_user, :tipo, :prop, :link)";
$sql = $pdo-> prepare($sql);
$sql-> bindValue(":id_user", "1");		// será substituido pelo 'id' do usuário logado
$sql-> bindValue(":tipo", "CURTIDA");		// tipo da notificação
$sql-> bindValue(":prop", json_encode($prop));		// transformando o array prop em 'json' e salvando no banco de dados
$sql-> bindValue(":link", "http://seusite.com/foto/123");
$sql-> execute();