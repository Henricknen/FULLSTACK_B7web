<?php

$arquivo = fopen("nomes.txt", "r");

$nome = fread($arquivo, 31);       // função fread faz a leitura do 'arquivo' que está sendo passado como parâmetro
$profissional = fread($arquivo, 11);        // segundo parâmetro da função é a quantidade d bytes que será lido

echo "Nome: ". $nome. "<br>";
echo "Profissional: ". $profissional. "<br>";