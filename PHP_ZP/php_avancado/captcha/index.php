<?php

session_start();        // iniçiando a 'seção'
$n = rand(1000, 9999);      // gerando um número 'aleatório'
$_SESSSION['captcha'] = $n;     // salvando número aleatório na seção

?>

<img src="imagem.php" width = "100" height = "50" />       <!-- exibindo a imagem -->