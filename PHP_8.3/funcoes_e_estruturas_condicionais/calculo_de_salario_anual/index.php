<?php

require 'functions.php';        // define todas as funções

define('IDADE_APOSENTADORIA_MASCULINA', 65);
define('IDADE_APOSENTADORIA_FEMININA', 62);

$nome = 'Luis Henrique Silva Ferreira';
$idade = 33;
$sexo = 'M';
$salario_mensal = 5000;  // Aqui você define o salário mensal
$tipo_de_trabalho = 'Freelancer';
$anos_para_aposentadoria = 40;
$skills = ['PHP', 'Laravel', 'JavaScript', 'VueJs', 'HTML', 'CSS'];

$sexo_do_profissional = ($sexo == 'M') ? 'Masculino' : 'Feminino';

$anos_necessarios_para_aposentadoria = ($sexo == 'M') ? IDADE_APOSENTADORIA_MASCULINA : IDADE_APOSENTADORIA_FEMININA;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo do salario anual</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Ficha</h1>
            <p>Nome: <strong><?= $nome; ?></strong></p>
            <p>Idade: <strong><?= $idade; ?></strong></p>       
            <p>Sexo: <strong><?= $sexo_do_profissional ?></strong></p>
            <p>Salário Mensal: <strong>R$: <?= number_format($salario_mensal, 2, ',', '.'); ?></strong></p>
            <p>Salário Anual: <strong>R$: <?= calcular_salario_anual($salario_mensal); ?></strong></p>      <!-- utilizando função que converte valor numérico em valor monetário -->
            <p>Trabalho: <strong><?= $tipo_de_trabalho; ?></strong></p>
            <p>Tempo para aposentadoria: <strong><?= $anos_necessarios_para_aposentadoria - $idade; ?></strong></p>
            <p>Habilidades: <strong><?= implode(', ', $skills); ?></strong></p>
        </div>
    </div>
</body>
</html>
