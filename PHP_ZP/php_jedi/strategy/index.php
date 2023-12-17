<?php
require 'classes.php';

$produtos = new Produtos();     // intançiando classe 'Produtos'
$produtos-> getLista();

// $produtos-> setOutput(new jsonOutput());
$produtos-> setOutput(new ArrayOutput());
$data = $produtos-> getOutput();

print_r($data);