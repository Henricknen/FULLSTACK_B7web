<?php

if(!empty($_GET['login']) && !empty($_GET['password'])) {       // verificando se as variáveis 'login' e 'password' estão sendo passadas na url 
    $login = $_GET['login'];        // pegando os dados 'login' e 'password'
    $password = $_GET['password'];

    echo "Seu login é: $login, e a senha: $password";
}