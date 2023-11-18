<?php

try {
    $pdo = new PDO("mysql:dbname=permissao_de_usuarios;host=localhost", "root", "");
} catch (PDOExceprtion $e) {
    echo "ERRO: ". $e-> getMessage();
    exit;
}