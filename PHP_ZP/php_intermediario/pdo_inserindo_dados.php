<?php

$string_de_conexao = "mysql:dbname=blog;host=localhost";      // variável de conexão ultilizando o nome do 'tipo' do banco de dados, o 'nome' do banco de dados e o host 'ip'  do banco de dados com parâmetro
$dbuser = "root";       // usuário do banco de dados
$dbpass = "";     // senha do banco de dados

try {
    $pdo = new PDO($string_de_conexao, $dbuser, $dbpass);       // iniçiando a biblioteca 'PDO' que se conectará com o banco de dados

    $nome = "FullStack";
    $email = "fullstack@gmail.com";
    $senha = md5("123");        // gerando uma senha 'hash'
    
    $sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";        // ultilizando 'INSERT INTO' para inserir dados na tabela 'usuarios'
    $sql = $pdo-> query($sql);      // executando de inserção

    echo "Usuário inserido: ". $pdo-> lastInsertId();       // retornando o 'id' do último 'lastInsertId' usuário  inserido no banco de dados

} catch(PDOException $e) {     // 'catch' executa as menssagens de erro 'PDOException' espeçifica a variável que será madado o erro
    echo "Falha: ". $e-> getMessage();
}