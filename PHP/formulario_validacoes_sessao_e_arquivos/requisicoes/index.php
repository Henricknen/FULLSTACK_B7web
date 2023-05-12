<?php
require('header.php');
?>

<form method = "POST" action = "recebedor.php">        <!-- 'POST' é o método de envio, e em 'action' é colocado o nome do arquivo para qual vai ser enviado os dados prenchidos neste formulario -->
    <label>
        Nome:
        <br>
        <input type = "text" name = "nome">
    </label>
    <br>
    <br>

    <label>
        Senha:
        <br>
        <input type = "password" name = "senha">
    </label>
    <br>
    <br>

    <input type = "submit" value = "Enviar">
</form>