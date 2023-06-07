<?php
session_start();        // iniçiando uma seção
require '../vendor/autoload.php';
require '../src/routes.php';

$router->run( $router->routes );