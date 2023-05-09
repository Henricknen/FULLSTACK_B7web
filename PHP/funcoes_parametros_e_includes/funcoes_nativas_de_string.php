<?php
$nome = 'Luis Henrique Silva Ferreira';
echo strtolower($nome). "<br>";     // função 'strtolower' transforma a string toda em minúscula
echo strtoupper($nome). "<hr>";         // 'toupper' transforma toda a string em maiúscula


$profissao = 'Front End';
$nomeAlterado = str_replace('Front End', ' Full Stack ', $profissao);      // função 'str_replace' faz a substituição de 'Front End' para 'Full Stack'
$nomeAlterado = str_replace(' ', '_', $nomeAlterado);        // substituindo carácter 'vazio' por um 'underline'
echo $nomeAlterado. "<hr>";


$formacao = 'Analise e desenvolvimento de sistemas/ Tecnico em informatica para internet/ Programador /front End/ Tecnico em eletroeletronica';
$parteString = substr($formacao, 0, 37);     // pegando apenas uma parte da 'string' com função 'substr'
echo $parteString. "<hr>";


$nomeComEspaco = '   Luis Henrique    ';
$nomeSemEspaco = trim($nomeComEspaco);       // função 'trim' elimina os espaços extras do conteúdo da variável '$nomeComEspaco'
echo "Nome com espaços: ". strlen($nomeComEspaco). "<br>";       // função 'strlen' conta quantos carácteres tem o conteúdo da variável 'nomeComEspaco'
echo "Nome sem espaços: ". strlen($nomeSemEspaco). "<br>";