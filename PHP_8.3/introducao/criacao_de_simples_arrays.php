<?php 
    $cidades = ["Paris", "Nova York", "Sydney", "Londres", "Tóquio"];        // array de cidades
    echo $cidades[1]. "<br>";       // imprimindo na tela array de indiçe 1

    $pessoas = ["Carlos" => 33, "Maria" => 28, "Julio" => 19];      // '$pessoas' é um array associativo com idades como 'valores'
    echo $pessoas["Maria"]. "<br>";        // para imprimir a idade 'valor' não é necessario utilizar o indiçe e sim o nome da pessoa do array

    $cores = ["branco", "azul", "vermelho", "amarelo"];      // arry de cores
    $cores[4] = "verde";     // adicionando cor verde ao indiçe 4 do array
    $cores[] = "roxo";      // [] vazio ao final do array insere um novo elemento no final
    array_shift($cores);    // remoção da primeira cor do array
    print_r($cores);     // 'print_r' imprime o array mais formatado

    echo "<br>";

    $precos = ["Computador" => 5000, "Tablet" => 2500, "Placa de video" => 800];
    $precos["Placa de video"] = $precos["Placa de video"] + 200;      // adicionando valor 200 a mais
    $precos["Tablet"] += 400;         // adiçionando 400 ao valor já existente
    print_r($precos);