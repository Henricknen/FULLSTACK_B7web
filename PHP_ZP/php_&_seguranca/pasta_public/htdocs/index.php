<?php 
require '../app/config.php';        // puchando arquivo config.php da pasta 'app' fora do servidor
require '../app/classes/Carro.php';     // puchando arquivo de classe da pasta 'classes'

$carro = new Carro();
$carro-> andar();