<?php

$string_de_conexao = "mysql:dbname=blog;host=localhost";      // variável de conexão ultilizando o nome do 'tipo' do banco de dados, o 'nome' do banco de dados e o host 'ip'  do banco de dados com parâmetro
$dbuser = "root";       // usuário do banco de dados
$dbpass = "";     // senha do banco de dados

try {
    $pdo = new PDO($string_de_conexao, $dbuser, $dbpass);       // iniçiando a biblioteca 'PDO' que se conectará com o banco de dados
 
    $novasenha = md5("lhsf");

    $sql = "UPDATE usuarios SET email = 'backend@gmail.com' WHERE email = 'fullstack@gmail.com'";      // alterando 'email'
    
    $sql = $pdo-> query($sql);

    $sql = "UPDATE usuarios SET senha = '$novasenha' WHERE id = 1";      // alterando 'senha'
    $pdo-> query($sql);

    echo "Usuário alterado com secesso...";

} catch(PDOException $e) {     // 'catch' executa as menssagens de erro 'PDOException' espeçifica a variável que será madado o erro
    echo "Falha: ". $e-> getMessage();
}