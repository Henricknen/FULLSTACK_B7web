<?php

try {
    $pdo = new PDO("mysql:dbname=esqueci_minha_senha;host=localhost", "root", "");        // conexao com banco de dados 'esqueci_minha_senha'
} catch(PDOExeption $e) {
    echo "ERRO: ". $e-> getMessage();
}