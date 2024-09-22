<?php

define('IDADE_APOSENTADORIA_MASCULINA', 65);
define('IDADE_APOSENTADORIA_FEMININA', 62);

$nome = 'Luis Henrique Silva Ferreira';
$idade = 33;
$sexo = 'M';
$salario_mensal = 5000;
$salario_anual = 71000;
$tipo_de_trabalho = 'Freelancer';
$esta_empregado = false;        // criando variável boolean
$anos_para_aposentadoria = 40;
$skills = ['PHP', 'Laravel', 'JavaScript', 'VueJs', 'HTML', 'CSS'];

$sexo_do_profissional = null;
$sexo_do_profissional = $sexo ==  'M' ? 'Masculino' : 'Feminino';        // utilizando 'operador ternário'

$anos_necessarios_para_aposentadoria = null;
$anos_necessarios_para_aposentadoria == 'M' ? IDADE_APOSENTADORIA_MASCULINA : IDADE_APOSENTADORIA_FEMININA;     // utilizando 'operador ternário'

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
            <p>Salário Mensal: <strong>R$: <?= number_format($salario_mensal, 2, ',', '.'); ?></strong></p>
            <p>Salário Anual: <strong>R$: <?= number_format($salario_anual, 2, ',', '.'); ?></strong></p>
            <p>Trabalho: <strong><?= $tipo_de_trabalho; ?></strong></p>
            <p>No momento: <strong><?= $esta_empregado == true ? 'Empregado SIM' : 'Diponível para novos projetos' ?></strong></p>      <!-- utilizando 'operador ternário' dentro do html -->
            <p>Tempo para aposentaria:<strong><?= $anos_necessarios_para_aposentadoria - $idade; ?></strong></p>
            <p>Habilidades: <strong><?= implode(', ', $skills) ?></strong></p>
        </div>
    </div>
</body>
</html>