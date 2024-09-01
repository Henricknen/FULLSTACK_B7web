<?php

$linguagem_de_marcacao_e_estilo = ["Html", "Css"];
$linguagens_de_programacao = ["PHP", "JavaScript"];
var_dump($linguagens_de_programacao);
echo "<br>";

$fullstack = array_merge($linguagens_de_programacao, $linguagem_de_marcacao_e_estilo);     // função 'array_merge' faz a junção de arrays
var_dump($fullstack);
echo "<br>";

array_push($linguagens_de_programacao, "Python");      // 'array_push' permite a adição de novo elemento ao array
var_dump($linguagens_de_programacao);
echo "<br>";

array_shift($linguagens_de_programacao);      // 'array_shift' remove um elemento do inicio do array
var_dump($linguagens_de_programacao);
echo "<br>";

array_pop($linguagens_de_programacao);      // 'array_pop' remove o último elemento do array
var_dump($linguagens_de_programacao);
echo "<br>";

$linguagens_de_programacao[3] = "Sql";      // adiçionando elemento o elemento do indice 3 do array ou modificando se ja haver elemento neste indice
var_dump($linguagens_de_programacao);
echo "<br>";

$quantidade_de_itens = count($linguagens_de_programacao);       // função 'count' faz a contagem da quantidade de elementos existentes
echo $quantidade_de_itens;
echo "<br>";

$tem_frameworks = in_array("Laravel", $linguagens_de_programacao);       // função 'in_array' faz a busca de Laravel dentro do array '$linguagens_de_programacao'
var_dump($tem_frameworks);
echo "<br>";


?>