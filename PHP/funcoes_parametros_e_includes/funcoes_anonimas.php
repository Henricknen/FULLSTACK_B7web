<?php
$dizimo = function(int $valor) {       // variável '$dizimo' recebe uma função 'fuction' anônima que recebe um valor '$valor'
    return $valor * 0.1;       // retornando 10% do '$valor'
};

echo $dizimo(90). "<hr>";       // chamando a função 'anônima' passando 90 como valor

$funcao = $dizimo;      // passando função anônima '$dizimo' para a variável '$funcao'

echo $funcao(101);