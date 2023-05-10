<?php
$lista = ['nome1', 'nome2', 'nome3', 'nome4', 'nome5'];

echo "Total: ". count($lista). "<hr>";       // função 'count' diz quantos mostra quanto itens tem no array '$lista'


$formacoes =['Analise e desenvolvimento de sistemas', 'Tecnico em Informatica para internet', 'Tecnico em Eletroeletronica', 'Front end', 'Lógica de programação'];        // array de 'formações'
$cursando = ['Analise e desenvolvimento de sistemas'];

$concluidas = array_diff($formacoes, $cursando);     // função 'array_diff' pega a diferença entre a 1º e a 2º lista e gera novo array com os itens da 1° lista que não estão na 2° lista
print_r($concluidas);
echo "<hr>";


$numeros = [10, 34, 56, 18, 101];
$filtrados = array_filter($numeros, function($item) {       // função 'array_filter' filtra alguma coisa no 'array'
    if($item < 30) {        // fazendo uma verificação que irá fazer o 'print' somente dos números menores que 30
        return true;
    } else {
        return false;
    }
});

print_r($filtrados);
echo "<hr>";

$dobrados = array_map(function($item) {       // função 'array_map' vai fazer um a mapeacão no array '$numeros' e executrar algo
    return $item * 2;        // multiplicação de cada '$item' do array '$numeros' por 2
}, $numeros);

print_r($dobrados);