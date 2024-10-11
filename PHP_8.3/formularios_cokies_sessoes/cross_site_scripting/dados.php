<?php

if(!empty($_POST['login']) && !empty($_POST['password'])) {
    $login = htmlspecialchars($_POST['login']);     // função 'htmlspecialchars' trata os dados antes de exibi-los na tela
    $password = htmlspecialchars($_POST['password']);

    echo "Seu login é: $login, e a senha: $password";
}