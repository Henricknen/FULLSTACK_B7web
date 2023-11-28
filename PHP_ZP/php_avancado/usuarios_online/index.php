<?php

require 'config.php';

$ip = $_SERVER['REMOTE_ADDR'];      // salva o 'ip' do usuário
$hora = date('H:i:s');     // pegando a hora do acesso
$sql = $pdo-> prepare("INSERT INTO acessos (ip, hora) VALUES (:ip, :hora)");       // sempre que acessar será feita a inserção de dados
$sql-> bindValue(":ip", $ip);
$sql-> bindValue(":hora", $hora);
$sql-> execute();

$sql = $pdo-> prepare("DELETE FROM acessos WHERE hora < :hora");     // deletando acessos onde a gora for menor que 2 minutos atrás
$sql-> bindValue(":hora", date('H:i:s', strtotime("-2 minutes")));
$sql-> execute();

$sql = "SELECT * FROM acessos WHERE hora > :hora GROUP BY ip";      // pegando todos 'acessos' válidos e 'GROUP BY' agrupa pelo 'ip'
$sql = $pdo-> prepare($sql);
$sql-> bindValue(":hora", date('H:i:s', strtotime("-2 minutes")));      // 'strtotime' transforma uma 'string' texo em um 'int' tempo real
$sql-> execute();
$contagem = $sql-> rowCount();

echo "OnLine: ". $contagem;