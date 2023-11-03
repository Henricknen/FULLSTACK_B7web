<?php

require 'sobre1.php';
require 'sobre2.php';

$sobre = new \aplicacao\v1\Sobre();     // instançiando classe espeçificando em qual subpasta imaginária ela está

echo "Versão: ". $sobre-> getVersao();      // puchando método 'getVersao' para mostrar a versão que está

?>