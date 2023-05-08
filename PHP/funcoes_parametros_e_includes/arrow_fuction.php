<?php
$dizimo = fn($valor) => $valor * 0.1;     // este '=>' simbolo chamado 'arrow' serve como indicador do 'return'

$somar = fn(int $n1, $n2 = 0) => $n1 + $n2;     // criando uma 'arrow fuction' somar com parâmentro '$n1' do tipo 'int' e '$n2' opcional

echo $dizimo(500). "<br><hr>";

echo $somar(110, 80);