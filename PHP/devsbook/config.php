<?php
session_start();        // iniçiando uma seção
$base = 'http://localhost/FULLSTACK_B7web/PHP/devsbook';     // base de 'url' do projeto

$db_name = 'devsbook';      // dados do banco de dados
$db_host = 'localhost';
$db__user ='root';
$db_pass = '';

$pdo = new PDO("mysql:dbname=". $db_name. ";host=". $db_host, $db__user, $db_pass);       // instançia do 'PDO'
