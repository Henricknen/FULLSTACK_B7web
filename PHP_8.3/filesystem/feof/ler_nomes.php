<?php

$arquivo = fopen("nomes.txt", "r");       // função 'fopen' é utilizada para abrir arquivos, com primeiro parâmetro o nome do arquivo e o segundo é o modo de leitura 'read'

$bytes = filesize("nomes.txt");     // função 'filesize' pega o tamanho do arquivo que está sendo passado como parâmetro

while(!feof($arquivo)) {        // enquanto não for 'feof' fim do arquivo
    $nome = fgets($arquivo);        // função 'fgets' lê o '$arquivo' e armazena o resultado na variável '$nome'
    echo $nome;
    echo "<br>";
}

fclose($arquivo);