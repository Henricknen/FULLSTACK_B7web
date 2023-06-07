<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');      // rota padrão leva para 'HomeController'
$router->get('/login', 'LoginController@signin');       // se usuário não estiver logado será redireçionado para está rota de 'signin'
$router->get('/cadastro', 'LoginController@signup');        // rota de cadastro 'signup'