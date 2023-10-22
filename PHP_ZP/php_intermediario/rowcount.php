<?php

try {
    // $pdo = new PDO("mysql: dbname=blog;host=localhost","root","");       // erro espaço na conexão 'mysql: dbname=blog;'
    // $pdo = new PDO("mysql:dbname=blog;host=localhost","root","root");        // " erro no banco de dados devido a uma senha incompatível com a configuração do banco de dados
    $pdo = new PDO("mysql:dbname=blog;host=localhost","root","");
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     // obrigando o 'PDO' mostrar o erro de verdade
} catch(PDOException $e) {
    echo "Erro: ". $e-> getMessage();
}

// $sql = "SELECT * FROM postss";       erro em 'posts'
$sql = "SELECT * FROM posts";
$sql = $pdo-> query($sql);      // erro no 'rowCount' quer dizer que está função não aconteçeu

echo "Total de posts: ". $sql-> rowCount();

?>