<?php
function somar($n1, $n2) {      // variáveis 'n1' e 'n2' sendo passadas como 'parâmetros'
    $total = $n1 + $n2;
    return $total;
}

// $soma = somar(12, 67);      // executando função 'somar' dentro da variável '$soma'
// echo "Total: ". $soma;         // imprimindo variável '$soma' que está chamando a função 'somar()' com parâmetros dentro

$x = somar(8, 2);       // variável '$x' chamando função 'somar()' e passando os valores '8' e '2'
$y = somar(3, 27);
$w = somar($x, $y);         // variável '$w' armazenará os valores das variaveis '$x' e '$y'

echo $w;