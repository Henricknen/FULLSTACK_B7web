<?php
require 'classes.php';

$luz = new Luz();       // criação da Luz

$c = new LuzOffCommand($luz);       // adiçionando na variável '$c' o comando que será executado
CallCommand($c);        // executando o comando 

echo "LUZ: ". $luz-> getStatus();       // imprimindo o 'status' atual da luz