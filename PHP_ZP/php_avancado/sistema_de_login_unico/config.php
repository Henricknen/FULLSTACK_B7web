<?php
try {
	$pdo = new PDO("mysql:dbname=projeto_login_unico;host=localhost", "root", "");
} catch(PDOException $e) {
	echo "ERRO: ". $e-> getMessage();
	exit;
}