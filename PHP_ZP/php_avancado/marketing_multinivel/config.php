<?php
try {
    global $pdo;        // trasnformando pdo em uma 'variável global'
    $pdo = new PDO("mysql:dbname=projeto_multi_nivel;host=localhost", "root", "");      // conexão com 'banco de dados'
} catch(PDOExeption $e) {
    echo "ERRO: ". $e-> getMessage();
}