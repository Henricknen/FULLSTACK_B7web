<?php

session_start();

if(empty($_SESSION['usuario'])) {       // se seção 'session' usuário for vazia
    header('Location:index.php');           // redireçiona para index.php 
    exit();     // encerra a execução do código
}

echo "Bem vindo, ". $_SESSION['usuario'];
echo "</br>";
echo  '<a href = "logout.php">Sair</a>';