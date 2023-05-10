<?php
$nomeCompleto = 'luis henrique silva ferreira';
$posicao = "A letra procurada se encontra na posição: ". strpos($nomeCompleto, 'q');      // 'strpos' mostra a posição exata da string dentro da variável
echo $posicao. "<br>";
$numero = 56498.65;

echo ucfirst($nomeCompleto). "<br>";        // ultilizando função 'ucfirst' para transformar a primeira letra em maiúscula

echo ucwords($posicao). "<br>";    // 'ucwords' trasnforma a primeira letra de cada palavra em maiúscula

echo 'R$: '. number_format($numero, 1, ',', '.'). "<br>";       // função 'number_format' faz a formatação de número

$nomes = explode(' ', $nomeCompleto);      // função 'explode' com dois parâmetros, primeiro é o ('divisor' e o segundo é a 'string'), transforma uma 'string' em um 'array'
print_r($nomes);
