<?php 
spl_autoload_register(function ($class) {      // função será chamada automaticamente ultilizando como parâmetro a '$class' que sera ultilizada
    // $base_dir = __DIR__ . '/src/';
    $base_dir = __DIR__. 'pacotes/';     // 'pacotes' é o diretório base onde estará todas as classes '__DIR__' leva para o diretório do projeto

    $file = $base_dir. str_replace('\\', '/', $class). '.php';      // invertendo as '\' por '/'

    if(file_exists($file)) {        // verificando se o arquivo existegit 
        require($file);
    }
});
            // Vendor Name\Subnamespaces\classe
$clientinfo = new Loja\Clients\ClientInfo;        // importando classe 'ClientInfo'
$co = new Loja\Clients\ClientOrders;        // importando classe 'ClientOrders'
$pi = new Loja\Products\ProductInfo;    // importando classe 'ProductInfo'

echo "Name: ". $clientinfo-> getName();
echo "Idade: ". $clientinfo-> getAge();

echo '<hr>';

print_r($co-> getAll());

echo '<hr>';

echo "Nome do Prod: ". $pi-> getName();