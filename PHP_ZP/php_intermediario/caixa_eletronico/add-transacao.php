<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
</head>
<body>
    <form method="POST">
    Tipo de Transação: <br>
    <select name="tipo">
        <option value="0">Deposito</option>
        <option value="1">Retirada</option>
    </select><br><br>

    Valor: <br>
    <input type="text" name="valor" pattern="[0-9.,]{1,}"><br><br>
    <input type="submit" value="Adiçionar">
    </form>
</body>
</html>