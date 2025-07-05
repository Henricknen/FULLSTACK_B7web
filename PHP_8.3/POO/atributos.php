<?php

class Carro {       // toda classe por convenção deve iniciar com letra maiúscula
    public string $cor;         // atributo 'cor' tipado como 'string'
    public int $ano;        // atributo 'ano'
    public string $modelo;    // atributo 'modelo'
}

$carro1 = new Carro;        // 'instânciando' a classe 'Carro' ou seja criando objeto 'Carro' na variável '$carro1'
$carro1-> cor = 'Azul';
$carro1-> ano = 2025;
$carro1-> modelo = 'ABCD';

echo '<br>Carro1:<br>';

$carro2 = new Carro;        // criando 'carro2' ultilizando classe 'Carro'
$carro2-> cor = 'Preto';
$carro2-> ano = 2024;
$carro2-> modelo = 'EFGH';

echo '<br>Carro2:<br>';
