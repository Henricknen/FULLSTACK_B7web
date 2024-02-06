<?php
define("CONFIG", array(     // constante 'CONFIG' com um 'array' associativo contendo informações de configuração do banco de dados
    'dbname'=> 'banco',
    'dbuser'=> 'root',
    'dbpass'=> 123
));

echo CONFIG['dbname'];      // imprime o valor associado à chave 'dbname' no array CONFIG
echo "<br>";
echo CONFIG['dbuser'];
echo "<br>";

// ---------------------------------------------------------------------

define("INFO", array(       // constante 'INFO' com um 'array' associativo contendo informações gerais do sistema
    'name'=> 'Nome do sistema',
    'version'=> '1.0'
));

echo "VERSÃO: ". INFO['version'];       // imprime a versão do sistema