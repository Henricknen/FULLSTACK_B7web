<?php
$numero = -8.4;
$numeroo = 3.7;
$numerooo = 15.784569;

echo abs($numero). "<hr>";      // função 'abs' retorna o o valor absoluto [número positivo]

echo pi(). "<hr>";      // função 'PI'

echo floor($numeroo). "<hr>";        // função 'floor' arredonda o '$numeroo' pra baixo

echo ceil($numeroo). "<hr>";    // função 'ceil' arredonda o '$numeroo' pra cima

echo round($numerooo). "<hr>";       // função 'round' é natural depende do proprio numero para arredondar para cima ou para baixo

$aleatorio = rand(3, 9);        // função 'rand' gera um valor aleatorio entre 3 a 9

echo $aleatorio. "<hr>";

$lista = [1, 5, 8, 6];

echo max($lista). "<hr>";       // função 'max' mostra o maior valor da '$lista'
echo min($lista);       // função 'min' mostra o menor valor da '$lista'