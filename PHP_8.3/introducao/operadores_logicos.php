<?php 

$idade = 18;
$tem_carteira = true;

if($idade >= 18 && $tem_carteira) {      // operador lógico '&&' verifica se ambas condições são verdadeiras
    echo 'É permitido dirigir...';
} else {
    echo 'Não é permitido dirigir...';
}

// -------------------------------------------------------------------------------------------------------------

if($idade >= 18 || $tem_carteira) {         // '||' é o operador ou, onde uma da condições tem que ser verdadeira
    echo 'Voçê já pode dirigir...';
}

// -------------------------------------------------------------------------------------------------------------

if(!$tem_carteira) {        // operador '!' faz uma negação
    echo 'Não pode dirigir...';
} else {
    echo 'Pode dirigir...';
}

// -------------------------------------------------------------------------------------------------------------

$carteira = null;       // a variável utilizando 'null' não mostra que tem valor

if($carteira === false) {        // '===' é um verificador de tipo
    echo 'Não pode dirigir...';     // se a variável '$carterira' for igual (===) a false 
} elseif($carteira === true) {        // 'elseif' faz umanova verificação
    echo 'Pode dirigir...';
} else {
    echo 'Não sei se voçê pode dirigir...';
}