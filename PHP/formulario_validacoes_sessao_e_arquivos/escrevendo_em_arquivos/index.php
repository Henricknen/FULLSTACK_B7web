<?php
$texto = file_get_contents('texto.txt');    // fazendo leitura do 'texto.txt'
$texto .= "\nLuis Henrique Silva Ferreira";        // adiçionando conteúdo em 'texto.txt'
file_put_contents('texto.txt', $texto);     // função 'file_put_contents' cria o arquivo se não existir se existir ela irá substituir este arquivo

echo 'Arquivo criado/alterado com sucesso!!!';      // menssagem que será exibida após a criação ou alteração