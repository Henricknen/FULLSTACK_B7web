<?php
$array = ['Luis Henrique S. F.', 31, 'FullStack', 'Martinopolis-SP'];       // array com informações aleatórias do profissional de TI

// $nome = $array[0];       // variável '$nome' reçebendo elemento da posição '0' do array
// $idade = $array[1];          // variável '$idade' reçebendo elemento da posição '1' do array
// $profissao = $array[2];          // variável '$profissao' reçebendo elemento da posição '2' do array
// $cidade = $array[3];                 // variável '$cidade' reçebendo elemento da posição '3' do array

list($nome, $idade, $profissao, $cidade) = $array;      // ultilizando função 'list' com os nomes das variáveis e o '$array' que será usado, alocando os elementos do array nas variáveis do 'list'

echo $nome. " tem ". $idade. " anos é um profissional ". $profissao. " mora na cidade de ". $cidade;        // imprimindo as informações