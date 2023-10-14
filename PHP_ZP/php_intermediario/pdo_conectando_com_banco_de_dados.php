<?php

$string_de_conexao = "mysql:dbname=blog;host=localhost";      // variável de conexão ultilizando o nome do 'tipo' do banco de dados, o 'nome' do banco de dados e o host 'ip'  do banco de dados com parâmetro
$dbuser = "root";       // usuário do banco de dados
$dbpass = "";     // senha do banco de dados

try {
    $pdo = new PDO($string_de_conexao, $dbuser, $dbpass);       // iniçiando a biblioteca 'PDO' que se conectará com o banco de dados

    echo "Conexão concluida com sucesso...";

} catch(PDOException $e) {     // 'catch' executa as menssagens de erro 'PDOException' espeçifica a variável que será madado o erro
    echo "Falha: ". $e-> getMessage();
}

?>