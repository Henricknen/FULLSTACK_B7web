<?php
$array = range(1, 30, 2);       // função 'range' exige dois parâmetros 1º item que vai iniçiar 2º item que vai terminar o 3° parâmetro indica a quantidade de números que irá pular
// $array = range('a', 'z');           // ultilizando 'letras' com parâmetro

foreach($array as $item) {      // '$item' é uma variável temporaria que armazenará cada item do '$array' 
    echo $item. "<br>";
}
