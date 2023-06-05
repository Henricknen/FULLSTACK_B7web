<?php       // arquivo de conexão com banco de dados
$db_host ='localhost';
$db_name = 'devnotes';
$db_user = 'root';
$db_pass = 'root';

$pdo = new PDO("mysql:dbname = $db_name;host = $db_host, $db_user, $db_pass");

$array = [
    'error' => '',
    'result' => []
];