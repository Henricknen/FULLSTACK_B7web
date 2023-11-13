<?php
require 'config.php';

if (!empty($_POST['email'])) {      // Verificando se 'email' foi enviado pelo formulário

    $email = $_POST['email'];

    $sql = "SELECT * FROM usuarios WHERE email = :email";       // verificando 'email' existe na tabela 'usuarios' do banco de dados

    $sql = $pdo->prepare($sql);

    $sql->bindValue(":email", $email);

    $sql->execute();

}
?>


<form method = "POST">
    Qual seu e-mail?<br/>
    <input type = "email" name = "email" /><br/>

    <input type = "submit" value = "Enviar" />
</form>