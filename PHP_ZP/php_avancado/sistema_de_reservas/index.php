<?php

require 'config.php';
require 'classes/carros.class.php';
require 'classes/reservas.class.php';

$reservas = new Reservas($pdo);     // instançiando classe 'Reservas' mandando como parâmetro a conexão 'pdo'
$carros = new Carros($pdo);

?>

<h1>Reservas</h1>

<?php

$lista = $reservas-> getReservas();     // aramznando as reservas 'encontradas' na variável 'lista'

foreach($lista as $item){
    $data1 = date('d/m/Y', strtotime($item['data_inicio']));
    $data2 = date('d/m/Y', strtotime($item['data_fim']));
    echo $item['pessoa']. ' reservou o carro '. $item['id_carro']. ' entre '. $data1. ' e '. $data2. '<br/>';
} 