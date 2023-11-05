<?php

include 'contato.class.php';        // incluindo o arquivo 'contato.class.php'

$contato = new Contato();       // intançiando a classe 'Contato' em um objeto chamado '$contato'

$contato-> adicionar('l.henrick@live.com', 'Luis Henrique Silva Ferreira');     // 'criando' contato
$contato-> adicionar('l.henrick@live.co', 'LHSF');

?>