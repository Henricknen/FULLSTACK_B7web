<?php

setcookie('nome', '', time() - 3600);     // setando 'cookie' de nome 'nome' valor vazio '' e tempo de expiração no passado '-' que automaticamente o apagará

header("Location: index.php");      // depois que o cookie for apagado o usúario será redireçionado para página 'index.php'
exit;