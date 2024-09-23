<?php

include 'linguagem.php';        // 'include' inclui o arquivo se o arquivo existir, se não existir da um erro e continua excutando o código
require 'informacoes.php';          // já a inclusão com 'require' da um erro e para a execução do código se o arquivo não existir 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arquivo pricipal</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>      <!-- visualização -->
    <h1>Estou codificando <?= $linguagem; ?></h1>
    <h2>/ Essa codificação foi feita no ano de <?= $ano; ?></h2>
</body>
</html>