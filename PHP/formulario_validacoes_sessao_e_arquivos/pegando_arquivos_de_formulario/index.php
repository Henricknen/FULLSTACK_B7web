<?php
require('header.php');
?>

<form method = "POST" action = "recebedor.php">        <!-- 'POST' é o método de envio e em 'action' é colocado o nome do arquivo para qual vai ser enviado os dados prenchidos no formulario -->
    <label>
        Nome:
        <br>
        <input type = "text" name = "nome">
    </label>
    <br>
    <br>

    <label>
        Idade:
        <br>
        <input type = "text" name = "idade">
    </label>
    <br>
    <br>

    <input type = "submit" value = "Enviar">
</form>