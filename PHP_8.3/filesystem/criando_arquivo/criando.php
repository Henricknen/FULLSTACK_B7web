<?php

$arquivo = fopen("skills.txt", "a");     // 'fopen' abre o arquivo no modo append 'a', que permite 'acrescentar' dados ao final ou 'cria' o arquivo se não existir e adiciona o ponteiro no final

fwrite($arquivo, 'FullStack-');
fwrite($arquivo, 'Front-End-');
fwrite($arquivo, 'Back-End');

fclose($arquivo);