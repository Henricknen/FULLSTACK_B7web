<?php

function saudacao() {       // função de saudação
    return 'Olá seja bem vindo...';     // retornando a saudação
}

echo saudacao();        // 'echo' é responsável por chamar a função 

$x = saudacao();        // armazenando a função dentro da variável '$x'
var_dump($x);       // 'var_dump' é utilzado para imprimir a variável '$x'

function numero() {     // função 'numero'
    return 3;       // retornará o número 3
}

$y = numero() + 3;      // imprimirá o número retornado mais 3
var_dump($y);