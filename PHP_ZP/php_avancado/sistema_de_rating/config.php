<?php
try {
    $pdo = new PDO("mysql:dbname=projeto_rating;host=localhost", "root","");
} catch (PDOExecption $e)  {
    echo "ERRO: ". $e-> getMessage;
    exit;
}