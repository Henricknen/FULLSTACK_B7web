<?php
$imagem = imagecreatetruecolor(300, 300);     // criando um 'quadrado' de 300 por 300 em $imagem

$cor = imagecolorallocate($imagem, 255, 0, 0);    // criando variável '$cor' que terá uma cor
imagefill($imagem, 0, 0, $cor);     // comando 'imagefill' com os quatros parâmetros preenche a imagem

header("Content-Type: image/jpeg");     // mundando o cabeçalho da página, transformando o arquivo em uma imagem
imagejpeg($imagem, null, 100);       // ultilizando o 2º parâmetro com 'null' a imagem não é salva e sim apresentada na tela

imagejpeg($imagem, 'nova_imagem.jpg', 100);       // salvando a imagem com nome 'nova_imagem.jpg'

imagepng($imagem, 'noma_imagem.png');       // gerando uma imagem em 'png'