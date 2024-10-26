<?php
require 'functions.php';

$tecnologias = ['HTML', 'CSS', 'PHP', 'JAVASCRIPT', 'SQL'];


$erro = null;
$sucesso = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {    

    if(empty($_POST['tecnologia'])) {
        $erro = 'Selecione uma Tecnologia';
    }
    $tecnologia = $_POST['tecnologia'] ?? [];
    var_dump($tecnologia);
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
    <form method="POST">
        <?php if (exibirErro($erro)) : ?>
            <p style="color:red"><?= $erro; ?></p>
        <?php endif; ?>

        <?php if (exibirErro($sucesso)) : ?>
            <p style="color:green">
                <?= $sucesso; ?>
            </p>
        <?php endif; ?>
        <form method = "POST">
            <?php foreach ($tecnologias as $tecnologia) : ?>

                <label>
                    <?= $tecnologia; ?>
                </label>
                <input type = "checkbox" name = "tecnologia[]" value = "<?= $tecnologia; ?>">
                <hr>

                <?php endforeach; ?>
                <input type="submit" value="Enviar">
        </form>
    </form>
</body>
</html>
