<?php

try {
    $pdo = new PDO("mysql:dbname=projeto_esqueciasenha;host=localhost", "root", "");        // conexao com banco de dados
} catch(PDOExeption $e) {
    echo "ERRO: ". $e-> getMessage();
}