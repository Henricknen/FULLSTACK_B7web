<?php
require 'functions.php';

$formas_pagamento = ['cartao', 'boleto', 'dinheiro'];       // formas de pagamento permitidas

$forma_pagamento_user = ['cartao', 'dinheiro'];        // formas de pagamento permitidas


$erro = null;
$sucesso = null;
$tecnologia_selecionada = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {    

    if(empty($_POST['forma_pagamento'])) {      // verificando se forma de pagamento está vazia
        $erro = "Selecione uma forma de pagamento";
    }

    $forma_pagamento = $_POST['forma_pagamento'] ?? '';

    if(!in_array($forma_pagamento, $forma_pagamento_user)) {     // verificando se a forma de pagamento está dentro do array de 'forma_pagamento_user'
        $erro = "Forma de pagamento inválida para o seu usúario";      // se a forma de pagamento não estiver dentro do array forma de pagamento, essa menssagem será apresentada para o usúario
    } else {
        $sucesso = "Forma de pagamento aceito!!!";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input_radio</title>
</head>
<body>
    <h1>Selecione a forma de pagamento</h1>
    <form method="POST">
        <?php if (exibirErro($erro)) : ?>
            <p style="color:red">
            <?= $erro; ?>
        </p>
        <?php endif; ?>

        <?php if (exibirErro($sucesso)) : ?>
            <p style="color:green">
                <?= $sucesso; ?>
            </p>
        <?php endif; ?>
        <form method = "POST">

        <?php foreach ($formas_pagamento as $forma_pagamento) : ?>
            <input type = "radio" name = "forma_pagamento" value = "<?= $forma_pagamento; ?>">
            <label>
                <?= $forma_pagamento; ?>
            </label>
            <br>    
        <?php endforeach; ?>

        <input type="submit" value="Enviar">
        </form>
    </form>
</body>
</html>
