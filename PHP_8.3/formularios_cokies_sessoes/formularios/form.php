<?php
require 'functions.php';

$erro = null;       // definindo variáveis nulas
$sucesso = null;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <h1>Formulário</h1>
    <form method = "POST">      <!-- formuláro utilizando método 'post' -->
    <?php if(exibirErro($erro)) : ?>        <!-- tratando menssagem de erro -->
        <p style = "color:red">
            <?= $erro; ?>       <!-- menssagem da variável '$erro' -->
        </p>
    <?php endif;?>
        <?php if(exibirErro($sucesso)) : ?>     <!-- tratando menssagem de sucesso -->
        <p style = "color:green">
            <?= $sucesso; ?>
        </p>
    <?php endif;?>
        <input type = "text" name = "texto" placehoder = "Digite o texto:">
        <input type = "submit" value = "Enviar">
    </form>
</body>
</html>