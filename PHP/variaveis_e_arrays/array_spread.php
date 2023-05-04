<?php
$bolo1 = [
    'açúcar',
    'farinha de trigo',
    'ovo',
    'Leite',
    'fermento em pó'
];

$bolo2 = [
    'vasilha',
    'água morna',
    'fermento em pó',
    ... $bolo1,        // operador 'spread' é os '...' antes do array, ele está pegando os valores do array '$bolo1' e jogando dentro do array '$bolo2'
    'corante'
];

echo  $bolo2 [ 3 ]." <br> ";        // o indiçe '3' pega o valor do array '$bolo1' que está sendo passado como array spread para o array '$bolo2'

$nome = [ 'Luis' , 'Henrique' , 'Siva' , 'Ferreira' ];
$formacao = [ 'Analise e development de sistemas' , 'Tecnico de informatica para internet' , 'Tecnico em eletroeletronica' , 'Programador front-end' ];
$perfil = [...$nome, ...$formacao];     // ultilizando 'spread' para concatenar o array $nome com o array $formacao

print_r($perfil);       // 'print_r' faz a visualização de tudo o que tem dentro do array