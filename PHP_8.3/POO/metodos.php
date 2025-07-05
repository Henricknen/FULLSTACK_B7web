<?php

class Carro {
    public string $cor;
    public int $ano;
    public string $modelo;
    
    public function acelerar() {        // 'método' acelerar
        echo 'Acelerando...';
    }

    public function freiar() {      // 'método' freiar
        echo 'Freiando...';
    }
}

$carro1 = new Carro;
$carro1-> cor = 'Azul';
$carro1-> ano = 2025;
$carro1-> modelo = 'ABCD';

echo '<br>Carro1:<br>';
$carro1-> acelerar();       // executando método 'acelerar'
$carro1-> freiar();     // executando método 'freiar'

$carro2 = new Carro;
$carro2-> cor = 'Preto';
$carro2-> ano = 2024;
$carro2-> modelo = 'EFGH';

echo '<br>Carro2:<br>';
$carro2-> acelerar();       // executando apenas método 'acelerar'