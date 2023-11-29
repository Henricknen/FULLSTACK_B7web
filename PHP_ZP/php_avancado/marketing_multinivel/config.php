<?php
try {
    $pdo = new PDO("mysql:dbname=projeto_multi_nivel;host=localhost", "root", "");
} catch(PDOExeption $e) {
    echo "ERRO: ". $e-> getMessage();
}