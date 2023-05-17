<?php
$array = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i'];

// $retorno = array_slice($array, 0, 2);       // ultilizando função 'array_slice' que necessita de alguns parâmetros, o 1º é o 'array' que será modificado, o 2º é por onde se quer que começe e o 3º é a quantidade de elementos que será pego
// $retorno = array_slice($array, 2);      // pega todos elementos apartir do 2º elemento
$retorno = array_slice($array, -2, 1);      // ultilizando '-2' se pega dois elementos de traz pra frente, ultilizando '1' no 3º parâmetro se pega apenas o penúltimo elemento do array

print_r($retorno);