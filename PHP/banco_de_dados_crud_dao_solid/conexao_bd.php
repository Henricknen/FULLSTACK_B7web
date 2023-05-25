<?php
$pdo = new PDO("mysql: dbname = test; host = localhost", "root", "");       // instanciando classe 'pdo' com os dados iniçiais de conexão com bd

$sql = $pdo-> query( 'SELECT * FROM usuarios');     // pegando a lista de usuarios da tabela 'usuario' ultilizando o metodo 'query' que faz consulta

echo " TOTAL: ". $sql-> rowCount();       // verificando quantos itens tem na tabela ultilizando a função 'rowCount'

$dados = $sql-> fetchAll(PDO :: FETCH_ASSOC);       // 'fetchAll' pegará todos os dados e armazenará em '$dados', 'PDO:: FETCH_ASSOC' elemina dupliçidade

echo '<pre>';       // 'pre' pula linha literalmente
print_r( $dados); 