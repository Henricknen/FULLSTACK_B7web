<?php
    $arquivo = fopen("./profissional/skills.txt", "a");     // abre ou cria o arquivo 'skills.txt' dentro da pasta 'profissional', a partir do diretório onde este script está sendo executado 'caminho relativo'

    fwrite($arquivo, "PHP");        // adicionando skill PHP no arquivo
    fwrite($arquivo, "\n");
    fwrite($arquivo, "JavaScript");
    fwrite($arquivo, "\n");
    fwrite($arquivo, "Laravel");
    fwrite($arquivo, "\n");
    fwrite($arquivo, "VueJs");
    fwrite($arquivo, "\n");
    fwrite($arquivo, "Sql");
    fwrite($arquivo, "\n");
    fwrite($arquivo, "HTML");
    fwrite($arquivo, "\n");
    fwrite($arquivo, "CSS");

    fclose($arquivo);


    $relativePath = "profissional/skills.txt";        // caminho relativo
    $absolutePath = realpath ($relativePath);       // função 'realpath' pega o caminho real 'relativo' e transforma em absoluto

    if(file_exists($absolutePath)) {        // função 'file_exists' verifica se arquivo ou diretório existe
        echo "Arquivo existe ";
    }

    echo $absolutePath;     // imprime o 'caminho completo' até chegar no arquivo skills.txt