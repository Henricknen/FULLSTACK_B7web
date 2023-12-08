<?php
require 'environment.php';

$config = array();      // array com as $configurações do banco de dados

if(ENVIRONMET == 'development') {       // fazendo conexão através de um servidor local
    define("BASSE_URL", "https://localhost/classificados_mvc/");       // diferençiação da url 'servidor local'
    $config['dbname'] = 'classificados_mvc';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
} else {        // conexão servidor externo 'hospedagem'
    define("BASSE_URL", "https:/classificados_mvc.com.br/");       // url 'servidor externo'
    $config['dbname'] = 'classificados_mvc';
    $config['host'] = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = '';
}

global $db;
try {
    $db = new PDO("mysql:dbname=". $config['dbname']. ";host=". $config['host'], $config['dbuser'], $config['dbpass']); // conexão com bd
} catch (PDOException $e) {
    echo "ERRO". $e-> getMessage();
    exit;
}