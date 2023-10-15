<?php

$string_de_conexao = "mysql:dbname=blog;host=localhost";      // variável de conexão ultilizando o nome do 'tipo' do banco de dados, o 'nome' do banco de dados e o host 'ip'  do banco de dados com parâmetro
$dbuser = "root";       // usuário do banco de dados
$dbpass = "";     // senha do banco de dados

try {
    $pdo = new PDO($string_de_conexao, $dbuser, $dbpass);       // iniçiando a biblioteca 'PDO' que se conectará com o banco de dados

    $sql = "SELECT * FROM usuarios WHERE email = 'l.henrick@live.com'";        // seleçionando todos os campos da tabela 'posts'     'WHERE' faz uma filtragem
    $sql = $pdo-> query($sql);       // mando a string '$sql' para o pdo

    if($sql-> rowCount() > 0) {     // verificando se a contagem de linhas for maior que 0 existe 'posts' cadastrados

        foreach($sql-> fetchAll() as $usuario) {        // 'fetchAll' pega todo o resultado da consulta e insere na variável '$usuario'
            echo "Nome: ". $usuario["nome"]. " - ". $usuario['email']. "<br/>";
        }
    } else {        // senão
        echo "Nâo a usuarios cadastrados...";
    }

} catch(PDOException $e) {     // 'catch' executa as menssagens de erro 'PDOException' espeçifica a variável que será madado o erro
    echo "Falha: ". $e-> getMessage();
}

?>