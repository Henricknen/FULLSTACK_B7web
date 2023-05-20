<?php
$pessoas = [
    ['nome' => 'fulano', 'sexo' => 'M', 'nota' => 10],
    ['nome' => 'ciclano', 'sexo' => 'M', 'nota' => 7],
    ['nome' => 'beltrana', 'sexo' => 'F', 'nota' => 5],
    ['nome' => 'josé', 'sexo' => 'M', 'nota' => 10],
    ['nome' => 'maria', 'sexo' => 'F', 'nota' => 9]
];

// Total de homens
function contar_m($subtotal, $item) {       // função 'contar_m' reçebendo '$subtotal' e '$item' como parâmetros
    if($item['sexo'] === 'M') {     // verificando se 'sexo' é igual a 'M'
        $subtotal++;        // incrementando '$subtotal' em 1
    }
    return $subtotal;       // depois da qualquer manipulação é dado um return em '$subtotal'
}

$total_m = array_reduce($pessoas, 'contar_m');        // variável '$total_m' reçebe função 'array_reduce' com parâmetros array '$pessoas' e função 'contar_m'  que fará a execução

// Soma das notas dos homens
function soma_m($subtotal, $item) {     // parâmetro '$subtotal' iniçia em 0 e será incrementado a cada rodada do loop
    if($item['sexo'] === 'M') {
        $subtotal += $item['nota'];     // somando '$subtotal' com a 'nota' da pessoa que passar pela verificação
    }
    return $subtotal;
}

$soma_m = array_reduce($pessoas, 'soma_m');     // função array_reduce reçebe dois parâmetros o 1º é o array '$pessoas' e o 2° a função que será executada

// Média das notas dos homens
$media_m = $soma_m/ $total_m;

echo "Total de Homens: ". $total_m. "<br>";
echo "Soma das notas dos homens: ". $soma_m. "<br>";
echo "Média das notas dos homens: ". $media_m. "<br>";