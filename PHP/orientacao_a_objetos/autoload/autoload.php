<?php
spl_autoload_register(function($class) {        // função 'spl_autoload_register' com uma função 'function' anônima, usada para fazer o  registro do autoload
    if(file_exists('arquivos_de_classes/'. $class. '.php')) {      // verificando se o arquivo existe
        require 'arquivos_de_classes/'. $class. '.php';     // puxando arquivo existente da pasta 'arquivos_de_classes'
    }
});