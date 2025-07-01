<?php

$arquivo = fopen("perfil.txt", "a");     // 'fopen' abre o arquivo no modo append 'a', que permite acrescentar dados ao final ou cria o arquivo se não existir

fwrite($arquivo, "\n");      // utilizando \n com "aspas duplas" para quebra de linha no arquivo onde será acrescentado o novo nome
fwrite($arquivo, 'ReactJs');        // inserindo 'ReactJs' no arquivo 'perfil.txt'

fclose($arquivo);