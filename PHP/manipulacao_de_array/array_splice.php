<?php
$array = ['a', 'b', 'c', 'd', 'e', 'f', 'g'];

// array_splice($array, 2, 4);     // função 'array_splice' reçebe como parâmetro o '$array' que será modificado e a posição de iniçio '2' e a quantidade '4' que será removido
array_splice($array, 2, 2, 'php');        // já o 4° parâmetro é o item que será inserido 'substituido' no array no lugar dos itens removidos

print_r($array);