<?php
spl_autoload_register(function($class) {         // função com função anônima, chamada 'spl_autoload_register' para fazer o registro do autoload
    $base_Dir = __DIR__. '/arquivos_de_classes/' ;      // variavel '$base_Dir' é o diretorio base '__DIR__' é uma constante global

    $arquivo =   $base_Dir .str_replace( '\\', ' / ', $class). ' .php';         // fazendo a inversão das barras '/' na variavel '$arquivo'

    if(file_exists($arquivo)) {      // verificando se '$arquivo' existe
        require $arquivo;       // se existir será puxado
    }
});