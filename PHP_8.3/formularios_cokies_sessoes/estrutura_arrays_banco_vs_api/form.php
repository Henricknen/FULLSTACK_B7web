<?php
require 'functions.php';

$tecnologias = ['HTML', 'CSS', 'PHP', 'JAVASCRIPT', 'SQL'];     // array de tecnologias

$tecnologias_banco = [      // estrutura de array que recebe informações do banco de dados
    ['codigo' => 'html',        // indiçe código
     'nome' => 'HTML'],             // indiçe nome 

    ['codigo' => 'css',
     'nome' => 'CSS'],

    ['codigo' => 'javascript',
     'nome' => 'JAVASCRIPT'],

    ['codigo' => 'php',
     'nome' => 'PHP'],

    ['codigo' => 'sql',
     'nome' => 'SQL'],
];

$tecnologias_api = [        // estrutura recbe informações de 'API externa'
    'react' => 'REACT',           // 'chave' => 'valor'
    'laravel' => 'LARAVEL',
    'bootstrap' => 'BOOTSTRAP',
    'vuejs' => 'VUEJS',
];

$erro = null;
$sucesso = null;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $opcao = $_POST['opcao'];
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
            <?php foreach($tecnologias_banco as $tec) : ?>
                <?= $tec['nome']; ?>        <!-- pegando o indiçe 'nome' -->
                <option value = "<?= $tec['codigo']; ?>">       <!-- pegando o indiçe 'código' -->
                </option>
            <?php endforeach; ?>

            <?php foreach($tecnologias_api as $codigo => $tecnologia) : ?>
                <option value = "<?= $codigo; ?>"><?= $tecnologia; ?></option>
            <?php endforeach; ?>
        </select>
        <input type = "submit" value = "Enviar">
    </form>
</body>
</html>