<?php 
$array = array('nome'=> 'Luis Henrique S. F.', 'idade'=> 32);       // array associativo contendo informações

$nome = $array['nome'] ?? '';       // Utilização operador null '??'  e atribuindo valor a $nome, se $array['nome'] existir, $nome receberá o valor correspondente, se não será atribuído uma string vazia ''

$idade = $array['idade'] ?? '';

echo "Me chamo: ". $nome. " e no momento desta codificação tenho: ". $idade. " anos";       // exibição das informações utilizando os valores obtidos ou uma string vazia caso não existam