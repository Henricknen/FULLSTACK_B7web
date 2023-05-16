<?php
$array = [
    'nome' => 'Luis Henrique S F',
    'idade' => 31,
    'profissao' => 'Developer FullStack'
];

$chaves = array_keys($array);       // função 'array_keys' gera outro array apenas com as 'chaves[]' este array será armazenado em em '$chaves'
print_r($chaves);       // imprimindo '$chaves'

echo "<br>";

$valores = array_values($array);        // função 'array_values' gera outro array só com os 'valores'
print_r($valores);

echo "<br>";

print_r($array);        // mostra o '$array' com chaves e valores