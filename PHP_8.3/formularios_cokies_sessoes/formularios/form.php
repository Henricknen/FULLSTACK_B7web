<?php
require 'functions.php';

$erro = null;       // definindo variáveis nulas
$sucesso = null;

if($_SERVER['REQUEST_METHOD'] == 'POST') {      // reçebendo dados do formulário
    $texto = $_POST['texto'];

    $texto = htmlspecialchars($texto);      // 'tirando' caracteres que não interessa
    $texto = trim($texto);      // 'remove' os espaços antes e depois da palavra

    if(filter_var($texto, FILTER_VALIDATE_EMAIL) == false) {        // 'FILTER_VALIDATE_EMAIL' verefica se o email é válido
        $erro = "Email inválido";
    } else if(empty($texto)) {     // 'validação' verificando se campo texto 'não está vazio'
        $erro = "O campo texto é obrigatório";
    } else if(strlen($texto) < 5) {
        $erro = "O texto tem que ter pelo menos 5 caracteres...";
    } else if(strlen($texto) > 10) {
        $erro = "O erro tem que ter no maxima 10 caracteres...";
    } else {
        $sucesso = "Campo válidado com sucesso...";
    }
}

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