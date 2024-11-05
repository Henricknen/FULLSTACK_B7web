<?php

$arquivo = fopen("nomes.txt", "r");       // função 'fopen' é utilizada para abrir arquivos, com primeiro parâmetro o nome do arquivo e o segundo é o modo de leitura 'read'

$bytes = filesize("nomes.txt");     // função 'filesize' pega o tamanho do arquivo que está sendo passado como parâmetro

$nome = fgets($arquivo);        // função 'fgets' le do inicio ao final da linha
echo $nome;
echo "<br>";
$profissao = fgets($arquivo);
echo $profissao;
echo "<br>";
$tecnologias = fgets($arquivo);
echo $tecnologias;

fclose($arquivo);