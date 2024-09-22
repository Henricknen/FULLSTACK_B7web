<?php

define('IDADE_APOSENTADORIA_MASCULINA', 65);        // denido constante
define('IDADE_APOSENTADORIA_FEMININA', 62);

$nome = 'Luis Henrique Silva Ferreira';
$idade = 33;
$sexo = 'M';
$salario_mensal = 5000;
$salario_anual = 71000;
$tipo_de_trabalho = 'Freelancer';
$anos_para_aposentadoria = 40;
$skills = ['PHP', 'Laravel', 'JavaScript', 'VueJs', 'HTML', 'CSS'];

$sexo_do_profissional = null;
if($sexo == 'M') {
    $sexo_do_profissional = 'Masculino';
} else {
    $sexo_do_profissional = 'Femenino';
}

$anos_necessarios_para_aposentadoria = null;
if($sexo == 'M') {
    $anos_necessarios_para_aposentadoria = IDADE_APOSENTADORIA_MASCULINA;      // substituindo numero fixo 'magic_numbers' por constante
} else {
    $anos_necessarios_para_aposentadoria = IDADE_APOSENTADORIA_FEMININA;
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variáveis</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>      <!-- visualização -->
    <div class = "container">
        <div class = "card">
            <h1>Ficha</h1>
            <p>Nome: <strong><?= $nome; ?></strong></p>
            <p>Idade: <strong><?= $idade; ?></strong></p>       
            <p>Sexo: <strong><?= $sexo_do_profissional ?></strong></p>
            <p>Salário Mensal: <strong>R$: <?= number_format($salario_mensal, 2, ',', '.'); ?></strong></p>      <!-- utilizando funão 'number_format' com duas casas decimais e invertendo virgula e ponto -->
            <p>Salário Anual: <strong>R$: <?= number_format($salario_anual, 2, ',', '.'); ?></strong></p>
            <p>Trabalho: <strong><?= $tipo_de_trabalho; ?></strong></p>
            <p>Tempo para aposentaria:<strong><?= $anos_necessarios_para_aposentadoria - $idade; ?></strong></p>
            <p>Habilidades: <strong><?= implode(', ', $skills) ?></strong></p>
        </div>
    </div>
</body>
</html>