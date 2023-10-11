<?php

function somarNumero($x, $y) {      // função 'somarNumero' reçebendo variável '$x' e '$y' como parâmetros
    $conta = $x + $y;       // variável '$conta' guardará o valor de '$x' + '$y'

    return $conta;      // 'return' retorna o 'resultado' da função
}

$resultado = somarNumero(10 ,20);       // chamando e passando valores para função 'somarNumero'
echo "Resultado da função 'somarNumero' é: ". $resultado. "<br/>";     // fazendo o print na tela

function mostrarNome() {        // função 'mostrarNome' semparâmetro
    return "Luis Henrique Silva Ferreira";
}

echo "Meu nome é: ". mostrarNome();

?>