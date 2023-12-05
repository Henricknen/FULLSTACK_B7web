<?php
session_start();        // o inçio da 'seção' tem que ser a primeira coisa a ser feita antes de qualquer dado ser impresso na tela

try {
    $pdo = new PDO("mysql:dbname=classificados;host=localhost", "root", "");        // estabeleçendo conexão com banco de dados
} catch(PDOException $e) {
    echo "ERRO". $e-> getMessage();
}