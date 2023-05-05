<?php
$nome = 'Luis Henrique Siva Ferreira<br>';
$programador = 'Programador Fullstack';


$perfil = $nome;
$perfil .= $programador ?? '';      // simplificando, se a variável '$programador' existir '??' será pega o propria variável '$programador', se não existir não sserá pego nada ''

echo $perfil;