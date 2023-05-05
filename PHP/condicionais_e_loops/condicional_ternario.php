<?php
$idade = 25;

     // condição   ? 'Resultado positivo : 'Resultado negativo';
echo ($idade < 18) ? 'Menor de idade' : 'Maior de idade<br>';       // criando 'condiçional ternario' dentro de uma única linha

$menorDeIdade = ($idade < 18) ? true : false;        // armazenando dentro da variável 'menorDeIdade' um valor 'boolean'

if($menorDeIdade) {     // verificando se variável '$menorDeIdade' é 'true' ou 'false'
    echo 'Menor';       // se for 'True'
} else {
    echo 'Maior';           // se for 'False'
}