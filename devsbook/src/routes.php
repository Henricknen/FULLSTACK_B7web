<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');      // rota padrão leva para 'HomeController' index
$router->get('/login', 'LoginController@signin');       // se usuário não estiver logado irá para 'signin'
$router->get('/cadastro', 'LoginController@signup');