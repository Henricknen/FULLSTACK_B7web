<?php

require 'config.php';

$ip = $_SERVER['REMOTE_ADDR'];      // salva o 'ip' do usuário
$hora = date('H:i:s');     // pegando a hora do acesso
$sql = $pdo-> prepare("INSERT INTO acessos (ip, hora) VALUES (:ip, :hora)");       // sempre que acessar será feita a inserção de dados
$sql-> bindValue(":ip", $ip);
$sql-> bindValue(":hora", $hora);
$sql-> execute();