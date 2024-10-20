<?php
require 'functions.php';

$tecnologias = ['HTML', 'CSS', 'PHP', 'JAVASCRIPT', 'SQL'];     // array de tecnologias

$erro = null;
$sucesso = null;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $opcao = $_POST['opcao'];    // 'capturando' o select
    echo $opcao;
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
    <form method = "POST">
    <?php if(exibirErro($erro)) : ?>
        <p style = "color:red">
            <?= $erro; ?>
        </p>
    <?php endif;?>
        <?php if(exibirErro($sucesso)) : ?>
        <p style = "color:green">
            <?= $sucesso; ?>
        </p>
    <?php endif;?>
        <select name = "opcao">
            <?php
                foreach($tecnologias as $tec) : ?>      <!-- 'foreach' percorra cada indiçe do array '$tecnologias -->
                    <option value = "<?= $tec; ?>"><?= $tec; ?></option>
                <?php endforeach; ?>
        </select>
        <input type = "submit" value = "Enviar">
    </form>
</body>
</html>