<?php
$arquivo = 'paisagem.jpg'; // nome do arquivo
$width = 300; // limite da largura
$height = 300; // limite da altura

list($originalWidth, $originalHeight) = getimagesize($arquivo); // função 'getimagesize' pega o tamanho do arquivo, utilizando função 'list' para pegar só os dois primeiros valores

$ratio = $originalWidth / $originalHeight; // calculando a proporção da imagem original
$ratioDest = $width / $height;

$finalWidth = 0;
$finalHeight = 0;
$finalX = 0; // variável de posição X
$finalY = 0; // variável de posição Y

if ($ratioDest > $ratio) {
    $finalWidth = $height * $ratio; // calculando a largura final
    $finalHeight = $height; // altura permanecerá a mesma
} else {
    $finalHeight = $width / $ratio; // calculando a altura final
    $finalWidth = $width; // largura permanecerá a mesma
}

if ($finalWidth < $width) {
    $finalWidth = $width; // corrigindo a largura
    $finalHeight = $width / $ratio;

    $finalY = -(($finalHeight - $height) / 2); // corrigindo a posição
} else {
    $finalHeight = $height; // corrigindo a altura
    $finalWidth = $height * $ratio;

    $finalX = -(($finalWidth - $width) / 2); // corrigindo a posição
}

$imagem = imagecreatetruecolor($width, $height); // criando imagem com 'imagecreatetruecolor', com os tamanhos desejados
$originalImg = imagecreatefromjpeg($arquivo); // utilizando 'imagecreatefromjpeg' para ler a imagem

imagecopyresampled(
    $imagem,
    $originalImg,
    $finalX, $finalY, 0, 0,
    $finalWidth, $finalHeight,
    $originalWidth, $originalHeight
);

header("Content-Type: image/jpeg"); // mostrando a imagem na tela
imagejpeg($imagem, null, 100);
