<?php

if(!empty($_POST['login']) && !empty($_POST['password'])) {       // alternando '$_GET' por '$_POST'
    $login = $_POST['login'];
    $password = $_POST['password'];

    echo "Seu login é: $login, e a senha: $password";
}