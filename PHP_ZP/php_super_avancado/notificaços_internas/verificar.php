<?php
try {
	$pdo = new PDO("mysql:dbname=projeto_notificaçoes_internas;host=localhost", "root", "");		// conexão com 'bd'
} catch(PDOException $e) {
	echo "ERRO: ".$e-> getMessage();
	exit;
}

$sql = "SELECT * FROM notificacoes WHERE id_user = '1' AND lido = '0'";		// pegando notificações do usuaário de 'id_user' 1 que ainda não foram lidas
$sql = $pdo-> query($sql);

$array = array('qt'=> 0);

if($sql-> rowCount() > 0) {		// verificando se teve algum retorno

	$array['qt'] = $sql-> rowCount();		// verificando as notificações não lidas

}

echo json_encode($array);		// array sendo retornado em forma de 'json'
exit;