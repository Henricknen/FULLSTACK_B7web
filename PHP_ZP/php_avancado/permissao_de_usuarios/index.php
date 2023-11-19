<?php

session_start();
require 'config.php';
require 'classes/usuarios.class.php';

if(!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}

$usuarios = new Usuarios($pdo);
$usuarios-> setUsuario($_SESSION['logado']);       // definindo (set) o usuário logado


?>
<h1>Teste[logado]</h1>
Permissoes: <?php print_r($usuarios-> getPermissoes()); ?>      <!-- gera um array com as permissões -->    