<?php
session_start();
require 'config.php';
?>

<form method="POST">
    E-mail:<br/>
    <input type = "email" name = "email" /><br/><br/>

    Senha:<br/>
    <input type = "password" name = "senha" /><br/><br/>

    <input type = "submit" value = "Enviar" />
</form>