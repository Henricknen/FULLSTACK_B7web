<?php
$ingredientes = [        // colchetes '[]' é a forma mais moderna de cria um 'array'
    'açúcar',      // valores armazenados dentro da variável '$ingredientes'
    'farinha de trigo',
    'ovo',
    'Leite',
    'fermento em pó'
];

echo  $ingredientes [ 4 ]." <br> ";       // fazendo a impreção do valor que está no índice 4 do array '$ingredientes'

$numerosDaSorte = [ 12 , 45 , 67 , 8 , 32 , 10 ];

echo " 1º número da lista é: ". $numerosDaSorte [ 0 ]. "<br>";
echo " 6º número da lista é: ". $numerosDaSorte [ 5 ]. "<br>";
