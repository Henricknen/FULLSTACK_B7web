<?php

session_start();        // iniçiando a seção
require 'config.php';
require 'classes/usuarios.class.php';       // puchando arquivo que contém a classe 'Usuario'

if(!empty($_POST['email'])) {       // verificando se 'email' foi preenchido
    $email = addcslashes($_POST['email'], '.');
    $senha = md5($_POST['senha']);

    $usuarios = new Usuarios($pdo);     // instançiando classe 'usuários'

    if($usuarios-> fazerLogin($email, $senha)) {        // verificando se 'login' foi feito com sucesso
        header("Location: index.php");
        exit;
    } else {
        echo "Usuário ou Senha errados...";
    }
}

?>

<h1>Login</h1>
<form method = "POST">      <!-- formulário de login -->
    E-mail:<br/>
    <input type="email" name = "email"></br><br/>

    Senha:<br/>
    <input type="password" name = "senha"></br><br/>

    <input type="submit" value = "Entrar"/>
</form>