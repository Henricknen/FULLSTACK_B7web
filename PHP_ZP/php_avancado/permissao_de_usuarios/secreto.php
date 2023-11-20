<?php

session_start();
require 'config.php';
require 'classes/usuarios.class.php';

if(!isset($_SESSION['logado'])) {       // verificando se usário esta 'logado'
    header("Location: login.php");
    exit;
}

$usuarios = new Usuarios($pdo);
$usuarios-> setUsuario($_SESSION['logado']);       // definindo (set) o usuário logado

if($usuarios-> temPermisao("SECRET") == false) {        // se usuário nã tiver permissão 'SECRET' será redireçionado para 'index.php'
    header("Location: index.php");
    exit;
}
?>
<h1>Página secreta</h1>