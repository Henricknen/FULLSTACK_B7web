<?php

class Carro {       // toda classe por convenção deve iniciar com letra maiúscula
    public string $cor;         // atributo 'cor' tipado como 'string'
    public int $ano;
    public string $modelo;
    
    public function acelerar() {        // 'método' acelerar
        echo 'Acelerando...';
    }

    public function freiar() {
        echo 'Freiando...';
    }
}

$carro1 = new Carro;        // 'instânciando' a classe 'Carro' ou seja criando objeto 'Carro' na variável '$carro1'
$carro1-> cor = 'Azul';
$carro1-> ano = 2025;
$carro1-> modelo = 'ABCD';

echo '<br>Carro1:<br>';
$carro1-> acelerar();       // executando método 'acelerar'
$carro1-> freiar();

$carro2 = new Carro;        // criando 'carro2' ultilizando classe 'Carro'
$carro2-> cor = 'Preto';
$carro2-> ano = 2024;
$carro2-> modelo = 'EFGH';

echo '<br>Carro2:<br>';
$carro2-> acelerar();
