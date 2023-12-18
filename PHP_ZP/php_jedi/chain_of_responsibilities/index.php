<?php
require 'classes.php';

$carga = new Carga(1500);       // criando carga de 1500 kg

$moto  = new Moto();        // instançiando as classes
$carro = new Carro();
$caminhao = new Caminhao();

$moto-> setSucessor($carro);        // 'setSucessor' mostra que 'carro' será o sucessor de 'moto'
$carro-> setSucessor($caminhao);

$moto-> transport($carga);      // executando ultilizando moto para 'transportar' a carga