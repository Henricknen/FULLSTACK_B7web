<?php

require 'config.php';
require 'classes/carros.class.php';
require 'classes/reservas.class.php';

$reservas = new Reservas($pdo);     // instançiando classe 'Reservas' mandando como parâmetro a conexão 'pdo'
$carros = new Carros($pdo);

?>
<h1>Adiçionar Reservas</h1>

<form method="POST">        <!-- formulário de adiçionar reservas -->
    Carro:<br/>
    <select name="carro">

    </select><br/><br/>

    Data de Inicio:<br/>
    <input type="text" name = "data_inicio" /><br/><br/>

    Data de Fim:<br/>
    <input type="text" name = "data_fim" /><br/><br/>

    Nome da pessoa:<br/>
    <input type="text" name = "pessoa" /><br/><br/>

    <input type="submit" value = "Reservar" />
</form>