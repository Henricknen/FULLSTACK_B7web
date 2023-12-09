<?php
session_start();
require 'config.php';

spl_autoload_register(function($class) {        // criação do 'autoload'

    if(file_exists('controllers/'. $class. '.php')) {       // se aequivo existe
        require 'controllers/'. $class. '.php';     // será dado um 'riquire' nele
    }
    else if(file_exists('models/'. $class. '.php')) {
        require 'models/'. $class. '.php';
    }
    else if(file_exists('core/'. $class. '.php')) {
        require 'core/'. $class. '.php';
    }

});

$core = new Core();     // instançiando a classe 'core'
$core-> run();      // executando função 'run'