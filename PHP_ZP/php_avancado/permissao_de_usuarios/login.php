<?php

session_start();
require 'config.php';

?>

<h1>Login</h1>
<form method = "POST">
    E-mail:<br/>
    <input type="email" name = "email"></br><br/>

    Senha:<br/>
    <input type="password" name = "senha"></br><br/>

    <input type="submit" vlaue = "Entrar"/>
</form>