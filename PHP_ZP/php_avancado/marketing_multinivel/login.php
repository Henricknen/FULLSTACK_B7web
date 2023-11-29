<?php
session_start();
require 'config.php';

if(!empty($_POST['email'])) {       // se campo de 'email' não estiver vazio
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    $sql = $pdo-> prepare("SELECT * FROM usuarios WHERE email = :email AND senha = :senha");
    $sql-> bindValue(":email", $email);
    $sql-> bindValue(":senha", $senha);
    $sql-> execute();

    if($sql-> rowCount() > 0) {

    } else {
        echo "Usuário e/ou Senha errados...";
    }
}
?>

<form method="POST">
    E-mail:<br/>
    <input type = "email" name = "email" /><br/><br/>

    Senha:<br/>
    <input type = "password" name = "senha" /><br/><br/>

    <input type = "submit" value = "Enviar" />
</form>