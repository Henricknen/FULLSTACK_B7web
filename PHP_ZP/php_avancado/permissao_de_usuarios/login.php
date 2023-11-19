<?php

session_start();
require 'config.php';
require 'classes/usuarios.class.php';

if(!empty($_POST['email'])) {       // verificando se 'email' foi preenchido
    $email = addcslashes($_POST['email'], '.');
    $senha = addcslashes($_POST['senha'], '.');

    $usuarios = new Usuarios($pdo);     // instançiando classe 'usuário'

    if($usuarios-> fazerLogin($email, $senha)) {        // verificando se 'login' foi feito com suçesso
        header("Location: index.php");
        exit;
    } else {
        echo "Usuário ou Senha errados...";
    }
}

?>

<h1>Login</h1>
<form method = "POST">
    E-mail:<br/>
    <input type="email" name = "email"></br><br/>

    Senha:<br/>
    <input type="password" name = "senha"></br><br/>

    <input type="submit" value = "Entrar"/>
</form>