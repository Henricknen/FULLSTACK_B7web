<?php

try {
    global $pdo;        // definindo variável 'pdo' como global para ser ultilizada em qualquer lugar do sistema
    $pdo = new PDO("mysql:dbname=projeto_multilinguagem;host=localhost", "root", "");       // conexão com 'banco de dados'
} catch (PDOExpticon $e) {
    echo "ERRO: ". get-> Message();
    exit;
}