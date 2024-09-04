<?php

$idade = 18;
$tem_carteira = true;

if($idade >= 18 && $tem_carteira) {     // se 'if' a primeira condição e a segunda condição for verdadeiras
    echo "Se a idade for maior que $idade, a pessoa é permitido dirigir";       // será impressa está menssagem
} else {        // se não 'else'
    echo "Se a idade for menor que $idade, a pessoa é proibida dirigir";        // será impressa está menssagem
}

?>