<?php
use core\Router;

$router = new Router();

// para se criar rotas se ultiliza'$router' e alguns comandos, comando 'get' se refere a requisição do tipo 'get'
$router-> get('/', 'HomeController@index');       // '/' é o parâmetro da rota e 'HomeController' é o nome do controller

$router-> get('/novo', 'UsuariosController@add');
$router-> post('/novo', 'UsuariosController@addAction');