<?php
$a = 10;
$b = 20;

$r = $a <=> $b;     // operador space 'spaceship' <=>

var_dump($r);

/*
$r == 0 -> Quando os valores forem IGUAIS
$r == -1 -> O $a é MENOR que $b
$r == 1 -> O $a é MAIOR que $b
*/