<?php
session_start();        // todas as páginas que preçisar usar uma seçãopreçisa ter o comando 'session_start()', que se não existir a seção ele a iniçia se existir ele a recupera
require('header.php');

if($_SESSION['aviso']) {        // verificando se  '$_SESSION['aviso']' existe
    echo $_SESSION['aviso'];        // se existir ela será mostrada na tela
    $_SESSION['aviso'] = '';       // depois de mostrado o 'aviso' é zerado
}

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
        Email:
        <br>
        <input type = "text" name = "email">
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