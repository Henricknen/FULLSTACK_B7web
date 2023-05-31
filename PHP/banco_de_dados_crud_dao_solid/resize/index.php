<?php
$arquivo = 'paisagem.jpg';      // nome do arquivo
$maxWidth = 500;        // limite da largura
$maxHeight = 250;           // limite da altura

list($originalWidth, $originalHeight) = getimagesize($arquivo);     // função 'getimagesize'pega o tamanho do arquivo, ultilizando função 'list' para pegar só os dois primeiros valores

$ratio = $originalWidth / $originalHeight;      // calculando a proporção da imagem 'ratio' original
$ratioDest = $maxWidth / $maxHeight;

$finalWidth = 0;
$finalHeight = 0;

if($ratioDest > $ratio) {
    $finalWidth = $maxHeight * $ratio;      // calculando a 'largura' ffinal
    $finalHeight = $maxHeight;      // altura permanecerá a mesma
} else {
    $finalHeight = $maxWidth * $ratio;      // calculando a 'altura' final
    $finalWidth = $maxWidth;        // altura permanecerá a mesma
}

$imagem = imagecreatetruecolor($finalWidth, $finalHeight);       // criando imagem com 'imagecreatetruecolor', com os tamanhos finais
$originalImg = imagecreatefromjpeg($arquivo);       // ultilizando 'imagecreatefromjpeg' para ler a imagem

imagecopyresampled(       // 'imagecopyresampled' copia a imagem
    $imagem,
    $originalImg,
    0, 0, 0, 0,
    $finalWidth, $finalHeight,
    $originalWidth, $originalHeight
);

header("Content-Type: image/jpeg");        // mostrando a imagem na tela
imagejpeg($imagem, null, 100);

imagejpeg($imagem, 'paisagem_nova.jpg', 100);       // salvando a imagem