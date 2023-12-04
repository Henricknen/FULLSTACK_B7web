<?php
spl_autoload_register(function($class){       // registrando o 'autoload' que ira procurar o arquivo necessario da pasta 'classes'

    require 'classes/'. $class. '.php';        // puchando arquivo '$class' da pasta classes chamado

});

$cachorro = new Cachorro();     // 'instançiando' classe Cachorro
$cachorro-> falar();

$pessoa = new Pessoa();
$pessoa-> andar();