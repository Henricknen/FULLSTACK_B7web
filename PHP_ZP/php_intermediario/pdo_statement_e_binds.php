<?php

$string_de_conexao = "mysql:dbname=blog;host=localhost";      // variável de conexão ultilizando o nome do 'tipo' do banco de dados, o 'nome' do banco de dados e o host 'ip'  do banco de dados com parâmetro
$dbuser = "root";       // usuário do banco de dados
$dbpass = "";     // senha do banco de dados

try {
    $pdo = new PDO($string_de_conexao, $dbuser, $dbpass);       // iniçiando a biblioteca 'PDO' que se conectará com o banco de dados

    $nome = 'Luis Henrique Silva Ferreira';     // 'nome' do usuário a ser atualizado
    $id = 2;        // 'id' do usuário a ser atualizado

    $sql = "UPDATE usuarios SET nome = :novonome WHERE id = :id";       // consulta 'ssql' para atualização, o uso de placeholders 'marcadores' ajuda a prevenir injeção de sql

    $sql = $pdo-> prepare($sql);
    $sql-> bindValue(':novonome', $nome);       // o valor de ':novonome' será substituído por '$nome'
    $sql-> bindValue(':id', $id);       // o valor de ':id' será substituído por '$id'
    $sql-> execute();
    

    echo "Usuário atualizado com sucesso...";

} catch(PDOException $e) {     // 'catch' executa as menssagens de erro 'PDOException' espeçifica a variável que será madado o erro
    echo "Falha: ". $e-> getMessage();
}