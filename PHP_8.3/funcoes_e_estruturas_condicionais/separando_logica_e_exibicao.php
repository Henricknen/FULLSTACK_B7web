<?php

$nome = 'Luis Henrique Silva Ferreira';
$idade = 33;
$sexo = 'M';
$salario_mensal = '######';
$salario_anual = '######';
$tipo_de_trabalho = 'Freelancer';
$anos_para_aposentadoria = 40;
$skills = ['PHP', 'Laravel', 'JavaScript', 'VueJs', 'HTML', 'CSS'];

$sexo_do_profissional = null;       // variável inicia nula
if($sexo == 'M') {      // lógica
    $sexo_do_profissional = 'Masculino';
} else {
    $sexo_do_profissional = 'Femenino';
}

$anos_necessarios_para_aposentadoria = null;
if($sexo == 'M') {
    $anos_necessarios_para_aposentadoria = 65;
} else {
    $anos_necessarios_para_aposentadoria = 62;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variáveis</title>
    <style>
        body{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        }
        .container{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100%;
        }
        .card{
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        max-width: 400px;
        text-align: center;
        }
        h1{
        color: #333;
        }
        p{
        color: #666;
        font-size: 1.1em;
        }
        strong{
        color: #000;
        }
    </style>
</head>
<body>      <!-- visualização -->
    <div class = "container">
        <div class = "card">
            <h1>Ficha</h1>
            <p>Nome: <strong><?= $nome; ?></strong></p>
            <p>Idade: <strong><?= $idade; ?></strong></p>       
            <p>Sexo: <strong><?= $sexo_do_profissional ?></strong></p>      <!-- utilizando variável '$sexo_do_profissional' que executa lógica do php -->
            <p>Salário Mensal: <strong><?= $salario_mensal; ?></strong></p>
            <p>Salário Anual: <strong><?= $salario_anual; ?></strong></p>
            <p>Trabalho: <strong><?= $tipo_de_trabalho; ?></strong></p>
            <p>Tempo para aposentaria:<strong><?= $anos_necessarios_para_aposentadoria - $idade; ?></strong></p>        <!-- utilizando variáveis para calculo da tempo necessário para aposentar -->
            <p>Habilidades: <strong><?= implode(', ', $skills) ?></strong></p>
        </div>
    </div>
</body>
</html>