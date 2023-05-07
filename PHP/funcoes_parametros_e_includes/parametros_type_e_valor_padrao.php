<?php
function valor($n1, $n2 = 0, $n3 = 0) {     // variáveis '$n2 = 0' '$n3 = 0' sendo definindas com valor padrão 0, se tornando opcionais
    $total = $n1 + $n2 + $n3;
    return $total;
}

$x = valor(2);      // mandando apenas um parâmetro para as variaveis da 'fuction valor' pois só um exige receber valor os outros são opcionais
$y = valor(20, 3, 27);      // chamada da função 'valor' passando três parâmetros
$w = valor($x, $y);

echo $w. "<br><hr>";

function type(int $n1, int $n2, int $n3) {      // 'int' antes do nome da variável é a definição do tipo do parâmetro, que e só reçeberá valores deste tipo
    $total = $n1 + $n2 + $n3;
    return $total;
}

$z = type(5, 9, 3);
echo $z;    