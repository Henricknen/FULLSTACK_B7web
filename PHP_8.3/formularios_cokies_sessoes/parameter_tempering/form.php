<?php
require 'functions.php';

$tecnologias = ['HTML', 'CSS', 'PHP', 'JAVASCRIPT', 'SQL'];     // todas opções

$opcoes_validas = ['PHP', 'JAVASCRIPT', 'SQL'];

$erro = null;
$sucesso = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $opcao = $_POST['opcao'];

    if(!in_array($opcao, $opcoes_validas)) {        // validação verificando se 'opção' escolhida pelo usuário não está dentro do array 'opcoes_validas'
        $erro = "Não é uma linguagem de programação...";
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
    <form method="POST">
        <?php if (exibirErro($erro)) : ?>
            <p style="color:red"><?= $erro; ?></p>
        <?php endif; ?>

        <?php if (exibirErro($sucesso)) : ?>
            <p style="color:green"><?= $sucesso; ?></p>
        <?php endif; ?>

        <select name="opcao">
            <?php foreach ($tecnologias as $tec) : ?>
                <option value = "<?= $tec; ?>"><?= $tec; ?></option>
            
            <?php endforeach;?>

            
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
