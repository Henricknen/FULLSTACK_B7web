<?php

require 'config.php';
require 'classes/carros.class.php';
require 'classes/reservas.class.php';

$reservas = new Reservas($pdo);     // instançiando classe 'Reservas' mandando como parâmetro a conexão 'pdo'
$carros = new Carros($pdo);

if(!empty($_POST['carro'])) {       // se o campo 'carro' estiver preenchido quer dizer que houve o envio do formulário
    $carro = addcslashes($_POST['carro']);      // pegando todos os dados
    $data_inicio = explode('/', addcslashes($_POST['data_inicio']));        // 'explode' inverte a '/' 
    $data_fim = explode('/', addcslashes($_POST['data_fim']));
    $pesssoa = addcslashes($_POST['pesssoa']);

    $data_inicio = $data_inicio[2]. '-'. $data_inicio[1]. '-'. $data_inicio[0];      // reodernando o array data_nicio' transformando de um padrão basileiro em um  formato 'internacional'
    $data_fim = $data_fim[2]. '-'. $data_fim[1]. '-'. $data_fim[0];

    if($reservas-> verificarDidponibilidade($carro, $data_inicio, $data_fim)) {     // verificando a 'disponibilidade' de reservas
        $reservas-> reservar($carro, $data_inicio, $data_fim, $pesssoa);        // reservando
    } else {
        echo "Este carro já está reservado neste período...";
    }
}

?>
<h1>Adiçionar Reservas</h1>

<form method="POST">        <!-- formulário de adiçionar reservas -->
    Carro:<br/>
    <select name="carro">
        <?php
        $lista = $carros-> getCarros();       // lista dos carros salvos no banco de dados

        foreach($lista as $carro):
            ?>
            <option value="<?php echo $carro['id']; ?>"><?php echo $carro['nome']; ?></option>      <!-- exibindo o 'id' e o 'nome' do carro no option -->
            <?php
        endforeach;
        ?>

    </select><br/><br/>

    Data de Inicio:<br/>
    <input type="text" name = "data_inicio" /><br/><br/>

    Data de Fim:<br/>
    <input type="text" name = "data_fim" /><br/><br/>

    Nome da pessoa:<br/>
    <input type="text" name = "pessoa" /><br/><br/>

    <input type="submit" value = "Reservar" />
</form>