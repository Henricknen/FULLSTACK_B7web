<?php

$array = array(
    "nome"=> "Luis Henrique Silva Ferreira",
    "idade"=> "32",
    "faculdade"=> "Análise es desenvolvimento de sistemas",
    "profissão"=> "Programador Full Stack",
    "cidade"=> "Martinópolis-sp"
);

$array2 = array_keys($array);       // 'array_keys' retorna um array só com as chaves do array que estiver dentro do parâmetro
echo implode("<br>", $array2);

echo "<br/>";
echo "<br/>";

$array2 = array_values($array);       // 'array_values' retorna um array só com os valores
echo implode("<br>", $array2);

echo "<br/>";
echo "<br/>";

asort($array);     // 'array_asort' ordena um array mantendo a sssociação entre indiçes e valores em ordem crescente
echo implode("<br>", $array);

echo "<br/>";
echo "<br/>";

echo "Total de registros:". count($array);        // 'count'conta o numero de elementos de uma variável ou propriedades de um objeto

echo "<br/>";
echo "<br/>";

if(in_array("Análise es desenvolvimento de sistemas", $array)) {        // 'in_array' checa se um valor existe em um array
    echo "Minha formação é: Análise es desenvolvimento de sistemas";         // esse comando só será apresentando se estiver dentro do '$array'
}

echo "<br/>";
echo "<br/>";

array_pop($array);      // 'array_pop' remove um elemento do iniçio do array
echo implode("<br>", $array);

echo "<br/>";
echo "<br/>";

array_shift($array);      // 'array_shift' remove um elemento do iniçio do array
echo implode("<br>", $array);

?>