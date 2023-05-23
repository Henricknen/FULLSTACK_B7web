<?php
require 'classe1.php';      // 'require' permite a ultilização do arquivo 'classe1.php'
require 'classe2.php';

$a = new namespace_1\Classe();      // ultilizando 'namespace_1' que contém a 'Classe' do arquivo 'classe1.php'
echo $a-> Testar();


require 'classes/matematica/basico.php';        // puxando arquivo 'basico.php' da pasta 'matematica' que está dentro da pasta 'classes'

use classes\matematica\Basico as MatematicaBasica;       // endereço da classe 'Basico' e enserindo seu nome ultilizando 'as' de MatematicaBasica

$basico = new MatematicaBasica();     // instançiando classe '$basico' só com o nome da classe