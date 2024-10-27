<?php
require 'functions.php';

$tecnologias = ['HTML', 'CSS', 'PHP', 'JAVASCRIPT', 'SQL'];


$erro = null;
$sucesso = null;
$tecnologia_selecionada = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {    

    if(empty($_POST['tecnologia'])) {
        $erro = 'Selecione uma Tecnologia';
    }

    $tecnologia_selecionada = $_POST['tecnologia'] ?? [];
    
    if(count($tecnologia_selecionada) != 1) {
        $erro = 'Selecione apenas uma Tecnologia';
    } else if ($tecnologia_selecionada[0] != 'HTML') {
        $erro = 'Você deve selecionar o HTML';
    } else {
        $sucesso = 'HTML Selecionado....';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>persistindo_dados</title>
</head>
<body>
    <h1>Selecione o HTML</h1>
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

        <select name = "tecnologia[]" multiple>
            <?php foreach($tecnologias as $tecnologia) : ?>
                <option value = "<?= $tecnologia; ?>">

                <?php if(in_array($tecnologia, $tecnologia_selecionada)) {
                    // echo 'selected';
                }
                    ?>
                    <?= $tecnologia; ?>
                </option>
            <?php endforeach; ?>
        </select>
            
                <input type="submit" value="Enviar">
        </form>
    </form>
</body>
</html>
