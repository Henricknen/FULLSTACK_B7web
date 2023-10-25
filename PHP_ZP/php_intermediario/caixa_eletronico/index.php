<?php

session_start();        // iniçiando a seção
if(isset($_SESSION['banco']) && empty($_SESSION['banco']) == false) {       // se existir a seção 'banco' e ela não estiver vazia

} else {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caixa Eletrônico</title>
</head>
<body>
    <h1>Banco XYX</h1>
    Agência: 0000<br/>
    Conta: 0000000-0<br/>
    <a href="sair.php">Sair</a>
</body>
</html>