<?php

session_start();
require 'config.php';
require 'classes/usuarios.class.php';

if(!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

$usuarios = new Usuarios($pdo);
$usuarios-> Usuario($_SESSION['logado']);       // definindo (set) o usuário logado


?>
<h1>Teste[logado]</h1>