<?php

session_start();

if(empty($_SESSION['usuario'])) {       // se seção 'session' usuário for vazia
    header('Location:index.php');           // redireçiona para index.php 
    exit();     // encerra a execução do código
}

$cor = '#eee';
if(!empty($_COOKIE['tema'])) {      // de cookie tema não estiver vazio
    $tema = $_COOKIE['tema'];

    if($tema == 'escuro') {
        $cor = '#333';
    } else {
        $cor = '#fff';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Secreta</title>
</head>
<body style = "background-color: <?= $cor ?>">

    <?php
    echo "Bem vindo, ". $_SESSION['usuario'];
    echo "</br>";
    echo  '<a href = "logout.php">Sair</a>';
    ?>
    
</body>
</html>

