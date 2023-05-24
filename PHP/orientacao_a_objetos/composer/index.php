<?php
require  'vendor/autoload.php';      // puxando o arquivo 'autoload.php' do composer para ultilizar as bibliotecas da pasta 'vendor'

// ultilizando a biblioteca 'monolog' que faz log
use  Monolog\Level;      // ultilizando 'use' para facilitar a programação
use  Monolog\Logger;
use  Monolog\Handler\StreamHandler;

// criação do canal de 'log'
$log = new Logger('nome');
$log-> pushHandler(new StreamHandler('teste.log', Logger:: WARNING));      // 'teste.log' é o arquivo que será salvo

$m = new \arquivos_de_classes\matematica\Matematica();
echo $m-> somar(10, 10);

// adição de dois registros
$log-> warning('Foo');
$log-> error('Bar');