<?php

function somar(float $num1, float $num2, float $num3 = null): float {      // 'float' força os tipos das variáveis como float, ': float' é a definição do tipo do retorno
    
        return $num1 + $num2 + $num3;       // retorna a soma das variáveis
    
}

echo somar(1.9, 2.2, 3.6);      // enviando valores decimais como parâmetros