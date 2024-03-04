<?php

$host = "localhost";        // endereço do servidor MySQL
$user = "root";     // nome de usuário do MySQL
$pass = "";     // senha do MySQL vazia
$db = "bd_site_php";        // nome do banco de dados

$link = mysqli_connect($host, $user, $pass, $db);       // estabelecimento da conexão com o banco de dados e armazenando na variável 