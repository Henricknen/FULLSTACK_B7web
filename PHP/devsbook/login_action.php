<?php
require 'config.php';
require 'models/Auth.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);      // pegando o 'email'
$password = filter_input(INPUT_POST, 'password');// pegando o 'password'

if($email && $password) {       // verificado se '$email' e '$password' foram enviados

    $auth = new Auth($pdo, $base);

    if($auth-> validatelogin($email, $password)) {
        header("Location: ". $base);        // se '$mail' e '$password' foram enviado vai para 'index'
        exit;
    }
}

$_SESSION['flash'] = 'E-mail e/ou senha errados.';       // mensagem de erro
header("location: ". $base. "/login.php");      // se não foram enviado vai para 'login.php'
exit;