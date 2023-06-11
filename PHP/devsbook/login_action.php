<?php
require 'config.php';
require 'Auth.php';

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);      // pegando o 'email'
$password = filter_input(INPUT_POST, 'password');// pegando o 'password'

if($email && $password) {       // verificado se '$email' e '$password' foram enviados

    $auth = new Auth($pdo, $base);

    if($auth-> validatelogin($email, $password)) {
        header("Location: ". $base);        // se foram enviado vai para 'index'
        exit;
    }
}

header("location: ". $base. "/login.php");      // se não foram enviado vai para 'login.php'
exit;