<?php
// $db_name = 'test';     // nome do banco de dados
// $db_host = 'localhost';     // nome do host
// $db_user = 'root';      // nome do usuario                        // ultilizando os dados separados
// $db_pass = '';      // senha do usuario

// $pdo = new PDO("mysql:dbname= " .$db_name. "; host = " .$db_host, $db_user, $db_pass);

$pdo = new PDO("mysql:dbname=test;host=localhost","root","");       // '$pdo' é uma string de conexão com banco de dados


// $db_name = 'test';      // nome do banco de dados
// $db_host = 'localhost';     // nome do host
// $db_user = 'root';              // nome do usúario
// $db_pass = '';     // senha do usúario

// $pdo = new PDO("mysql:dbname=". $db_name.";host=". $db_host, $db_user, $db_pass);       // '$pdo' é uma string de conexão com banco de dados