<?php

try {
    $pdo = new PDO("mysql:dbname=projeto_sistema_de_reservas;host=localhost", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    throw new Exception("Erro na conexão com o banco de dados: " . $e->getMessage());
}

return $pdo;
