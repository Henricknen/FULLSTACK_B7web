<?php
    $string_de_conexao = "mysql:dbname=blog;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try {
        $pdo = new PDO($string_de_conexao, $dbuser, $dbpass);       // conexão com banco de dados
    } catch(PDOException $e) {
        echo "Falhou a conexão: ". $e-> getMessage();
    }

?>