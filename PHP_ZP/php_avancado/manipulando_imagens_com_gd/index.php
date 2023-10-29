<?php

$imagem = "certificado_Laravel.png";        // pegando a imagem original

list($largura_original, $altura_original) = getimagesize($imagem);      // pegando o tamanho original da imagem 
list($largura_mini, $altura_mini) = getimagesize("mini_imagem.png");

$imagem_final = imagecreatetruecolor($largura_original, $altura_original);      // criando a imagem final

$imagem_original = imagecreatefrompng("certificado_Laravel.png");
$imagem_mini = imagecreatefrompng("mini_imagem.png");       // criando uma 'mini' imagem

imagecopy($imagem_final, $imagem_original,       // ultilizando função 'imagecopy' para copiar a imagem, ou seja pegando a imagecopy '$imagem_original' e colando em cima da '$imagem_final'
    0, 0, 0, 0,     // posições onde a imagem ficará
    $largura_original, $altura_original);

imagecopy($imagem_final, $imagem_mini,
    0, 0, 0, 0,
    $largura_mini, $altura_mini);

header("Content-Type: image/png");      // transformando o documento em uma imagem
imagepng($imagem_final, null);

?>