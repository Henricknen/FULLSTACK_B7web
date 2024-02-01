<?php 
require __DIR__. '/vendor/autoload.php';        // puchando o autoload do 'composer'

$clientinfo = new Loja\Clients\ClientInfo;
$co = new Loja\Clients\ClientOrders;
$pi = new Loja\Products\ProductInfo;

echo "Name: ". $clientinfo-> getName();
echo "<br>";
echo "Idade: ". $clientinfo-> getAge();

echo '<hr>';

print_r($co-> getAll());

echo '<hr>';

echo "Nome do Prod: ". $pi-> getName();