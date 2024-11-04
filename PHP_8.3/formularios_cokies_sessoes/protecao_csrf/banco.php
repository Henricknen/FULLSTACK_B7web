<?php
session_start();        // abrindo uma 'seção'

$csrf = radom(1111, 9999);      // csrf será um número aleatório entre '1111' a '9999'
$_SESSION['csrf_token'] = $csrf;        // salvando o 'crsf' gerado aleatóriamente na seção
?>

<!DOCTYPE html>
<html lang = "pt-bt">

<head>
    <meta charset = "UTF-8">
    <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
    <title>Página Banco</title>
</head>

<body>
    <form action = "http://127.0.0.1/curso-php/modulo3/formularios/csrf/transferir.php" method = "GET">
        <input type = "hidden" name = "csrf_token" value = "<?= $crsf; ?>" />       <!-- 'value' reçebe o crsf criadoa aleatóriamente -->
        <label for = "conta_destino">Conta Destino:</label>
        <input type = "text" name = "conta_destino" id = "conta_destino" value = "12345">
        <label for = "valor">Valor:</label>
        <input type = "number" name = "valor" id = "valor" value = "1000">
        <button type = "submit">Transferir</button>
    </form>
</body>

</html>