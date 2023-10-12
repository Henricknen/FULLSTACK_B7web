<?php

echo abs(-10). "<br/>";      // retorna o valor absoluto

echo round(2.6). "<br/>";        // retorna um valor arredondado

echo ceil(5.3). "<br/>";        // retorna um valor arredondado para cima

echo floor(2.8). "<br/>";       // retorna um valor arredondado para baixo

$formacao = array("Analíse e desenvolvimento de sistemas", "Técnico em Informatica para internet", "Técnico em Eletroeletrônica", "Programador Front End");
$x = rand(0, 3);       // retorna um numero aleatrório

echo "A formação sorteado é: ". $formacao[$x];

?>