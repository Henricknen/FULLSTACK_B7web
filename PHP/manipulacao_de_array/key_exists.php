<?php
$array = [
    'nome' => 'Luis Henrique S F',
    'idade' => 31,
    'profissao' => 'Developer FullStack'
];

if(key_exists('idade', $array)) {       // fazendo verificação ultilizando função 'key_exists' que tem dois parâmetros ' o 1º é a chave 'idade', é o que está procurando e o 2° é o '$array', é onde está procurando
    $idade = $array['idade'];
    echo $idade. " anos.";
} else {        //se a chave 'idade' não existir
    echo "Não tem idade.";
}