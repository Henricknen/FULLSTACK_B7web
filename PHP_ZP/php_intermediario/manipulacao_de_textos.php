<?php

$nome = "Luis Henrique Silva Ferreira";

$x = explode(" ", $nome);        // função 'explode' exige dois parâmetro, 1º é onde vai ser feita a divisão e o 2º é a propria 'string'
print_r($x);

$array = array("Luis Henrique Silva Ferreira");
$nomecompleto = implode(" ", $array);       // junta com um espaço " "
echo "<br/>". $nomecompleto;

$x = number_format(74565454.8652357, 2, ", ", ". ");        // 1º parâmetro é o próprio número, 2º é a quantidade de números depois da vírgula o 3º espeçifica o que vai ser nas dezenas e o 4º espeçifica o que vai ser nas milhares
echo "<br/>". $x;

$profissao = "Programador Front End";
$string = str_replace("Front End", "Full Stack", $profissao);     // 1º parâmetro é o que vai ser trocado, 2º o que será inserido no lugar do 1º e o 3º a string em que será feito a troca
echo "<br/>". $string;

echo strtoupper("<br/> Tecnico em Informatica para internet...");       // 'strtoupper' trasnforma toda string em maiúscula

$formacao = "Analise de desenvolvimento de sistemas";
$x = substr($formacao, 12, 38);      // função 'subtr' retorna uma parte da string o 1º parâmetro é a própria string, 2º possição iniçial do corte e o 3º a posição final do crote
echo "<br/>". $x;

?>