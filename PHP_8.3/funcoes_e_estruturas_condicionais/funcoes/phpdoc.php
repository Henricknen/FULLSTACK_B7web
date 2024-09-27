<?php

/**
* Soma dois numeros
*
* @param float $n1 Primeiro numero a ser somado
* @param float $n2 Segundo numero a ser somado
*
* @return float Soma dos dois numeros
*/

function somar(float $num1, float $num2): float {
    return $num1 + $num2;
}

echo somar(100, 200);