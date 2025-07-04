<?php

class Carro {       // toda classe por convenção deve iniciar com letra maiúscula
    public string $cor;         // atributo 'cor' tipado como 'string'
    public int $ano;
    public string $modelo;
}

$carro1 = new Carro;        // 'instânciando' a classe 'Carro' ou seja criando objeto 'Carro' na variável '$carro1'
$carro1-> cor = 'Azul';
$carro1-> ano = 2025;
$carro1-> modelo = 'ABCD';

print_r($carro1);

$carro2 = new Carro;        // criando 'carro2' ultilizando classe 'Carro'
$carro2-> cor = 'Preto';
$carro2-> ano = 2024;
$carro2-> modelo = 'EFGH';

print_r($carro2);