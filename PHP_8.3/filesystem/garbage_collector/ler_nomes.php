<?php

$arquivo = fopen("nomes.txt", "r");       // função 'fopen' é utilizada para abrir arquivos, com primeiro parâmetro o nome do arquivo e o segundo é o modo de leitura 'read'
if($arquivo) {
    echo "Arquivo aberto com sucesso...";
    fclose($arquivo);      // função 'fclose' fecha o arquivo (tira da memória)
} else {
    echo "Arquivo não encontrado ou não aberto...";
}

print_r($arquivo);