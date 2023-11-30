<?php
session_start();
require 'config.php';

if(empty($_SESSION['mmnlogin'])) {          // verificando se a seção está vazia ou não existir
    header("Location: login.php");      // redireçiona o usuário para página de login
    exit;
}

$id = $_SESSION['mmnlogin'];

$sql = $pdo-> prepare("SELECT nome FROM usuarios WHERE id = :id");      // puchando nome do usuário logado
$sql-> bindValue(":id", $id);
$sql-> execute();


// - 16:27