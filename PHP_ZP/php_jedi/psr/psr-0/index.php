<?php 
spl_autoload_register(function ($class) {      // função será chamada automaticamente ultilizando como parâmetro a '$class' que sera ultilizada
    $file = 'classes/'. $class . '.php';        // caminho do arquivo da classe com base no namespace e diretório 'classes/'
    if(file_exists($file)) {        // verifica se a arquivo da classe existe
        require ($file);    
    }
});

$profissional = new Profissional;       // este código executará 'spl_autoload_register'
echo "Profisional: ". $profissional-> getProfissao();       // imprime a profissão
