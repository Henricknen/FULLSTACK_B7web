<?php
require 'classes.php';

$observador = new ProfissionalObserver();        // criação do observador

$usuario = new Usuario("Back End");        // criando do 'objeto' de nome Back End
$usuario-> attach($observador);      // adiçionando o observador que 'notificará' o observer de 'qualquer alterção feita' no objeto usuário

echo "PROFISSIONAL: ". $usuario-> getName();
echo "<hr>";

$usuario-> setName("Front End");      // alterando o nome do usuário 'setName' notifica o observador

echo "PROFISSIONAL: ". $usuario-> getName();
echo "<hr>";

$usuario-> detach($observador);     // removendo o observador

$usuario-> setName("FullStack");

echo "PROFISSIONAL: ". $usuario-> getName();
// echo "<hr>";