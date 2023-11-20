<?php

session_start();
header("Content-type: image/jpeg");     // mudando o 'cabeçalho' deste arquivo transformando em uma 'imagem'

// $n = $_SESSION['captcha'];

$imagem = imagecreate(100, 50);     // criação da imagem com 100 de 'largura' e 50 de 'altura'
imagecolorallocate($imagem, 200, 200, 200);

imagejpeg($imagem, null, 100);

?>