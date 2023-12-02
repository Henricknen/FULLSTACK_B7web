<?php
try {
    $pdo = new PDO("mysql:dbname=projeto_multi_nivel;host=localhost", "root", "");      // conexão com 'banco de dados'
} catch(PDOExeption $e) {
    echo "ERRO: ". $e-> getMessage();
}