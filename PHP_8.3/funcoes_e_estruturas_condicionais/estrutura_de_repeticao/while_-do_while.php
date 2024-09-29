<?php

$idade = 1;

while($idade < 10) {        // condição
    echo "A sua idade é: $idade< br/ >";        // enquanto condição for verdadeira será exibido esse echo
    $idade++;       // incrementação de $idade
}

do {
    echo "A sua idade é: $idade< br/ >";        // primeiro mostra na tela
} while ($idade < 1);       // depois executa a condição