<?php

try {
    $pdo = new PDO("mysql:dbname=acessos;host=localhost", "root","");
} catch (PDOExecption $e)  {
    echo "ERRO: ". $e-> getMessage();
    exit;
}