<?php
function somar($n1, $n2) {
    $total = $n1 + $n2;
    return $total;
}

$x = 3;     // '$x' assume o valor de 3
$y = 7;         // '$y' assume o valor de 7
$soma = somar($x, $y);      // criando 'passagem de parametro por valor', passando os valores 3 e 7 que estão armazenados nas variáveis '$x' e '$y'

echo "Passagem de parâmetro por Valor:<br>";
echo "Total: ". $soma. "<br>";

echo "<hr>";

function ref($n1, $n2, &$total) {       //  recebendo variável '$total' por referência ultilizando '&'
    $total = $n1 + $n2;
}

$x = 3;
$y = 18;
$soma = 0;
ref($x, $y, $soma);

echo "Passagem de parâmetro por Referência:<br>";
echo $x. ' + '. $y. ' = '. $soma;