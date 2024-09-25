<?php

function somar($num1, $num2, $num3 = null) {        // 'null' deixa 'num3' opcional
    if($num3) {
        return "Número 1: $num1, Número 2: $num2, Número 3: $num3";     // se haver '$num3' retornará essa linha
    } else {
        return "Número 1: $num1, Número 2: $num2";      // se não haver '$num3' retornará essa linha
    }
}

echo somar(100, 200);