<?php

$formacao = 'Análise e desenvolvimento de sistemas/ Pós Desenvolvimento Web/ Técnico Informática para internet/ Técnico Eletroeletronica/ Programador Front End';        // variável 'formacao' é uma string
$numeroCaracteres = strlen($formacao);       // função 'strlen' serve para fazer a contagem de caracteres que a variável contém
$posicao = strpos($formacao, "Pós Desenvolvimento Web");        // 'strpos' busca a posição da palavra na string
$parteString = substr($formacao, 0, 38);       // 'substr' retorna a parte de uma string, recebe comoparâmetro e o número de inçio e o número de caracteres que será impresso

echo "Sou formado em: ". $formacao;     // 'echo' permite fazer a exibição

echo "<br>";        // '<br>' permite a quebra de linha

echo "A variável Fomação possui: ". $numeroCaracteres. " caracteres<br>";

echo "Minha útima formação iniçia da posição de número: ". $posicao. "<br>";

echo "A parte da string adiquirida pela função substr é: ". $parteString;

?>