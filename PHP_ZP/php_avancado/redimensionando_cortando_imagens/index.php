<?php

$arquivo = "certificado_PHP.png";       // variável '$arquivo' com o nome da imagem

$largura = 200;     // altura máxima que a imagem tem que ter
$altura = 200;          // largura máxima

list($largura_original, $altura_original) = getimagesize($arquivo);     // 'getimagesize' retorna um array com duas propriedades (tamanho) do '$arquivo' e a função 'list' pega estás propriedades e guarda nas variáveis 'tamanhos originais'

$ratio = $largura_original / $altura_original;      // 'ratio' é a proporção entre a largura e a altura

if($largura > $ratio ) {        // calculo da nova 'largura' e 'altura' que a imagem terá
    $largura = $altura * $ratio;
} else {
    $altura = $largura / $ratio;
}

$imagem_final = imagecreatetruecolor($largura, $altura);        // criação da nova imagem sem nada dentro 'imagecreatetruecolor' é php 'gd'

$imagem_original = imagecreatefrompng($arquivo);        // pegando a imagem original

imagecopyresampled($imagem_final, $imagem_original,        //  função 'imagecopyresampled' copia a imagem '$imagem_original' redimensionada na '$imagem_final'
    0, 0, 0, 0,
    $largura, $altura, $largura_original, $altura_original);

header("Content-Type: image/png");      // transformando o arquivo 'index.php' em um arquivo de imagem
imagepng($imagem_final, null);      // exibindo na tela

imagepng($imagem_final, "mini_imagem.png");      // salvando a imagem com nome de 'mini_imagem.png'

?>