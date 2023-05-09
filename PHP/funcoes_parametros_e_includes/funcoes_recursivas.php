<?php
function dividir($numero) {     // função 'dividir' recebe um '$numero'
    $metade = $numero / 2;
    echo $metade. "<br>";

    if(round($metade) > 0) {        // função 'round' faz o arredondamento do resultado, transformando '$metade' em um número inteiro
        dividir($metade);       // se '$metade' ainda for maior que 0 é chamada a função 'dividir' novamente [recursividade]
    }
}

dividir(100);