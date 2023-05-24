<?php
require 'autoload.php';

use \matematica\Matematica;       // ultilizando classe 'Matematica'
use \foto\Upload;

$m = new Matematica();
echo  $m-> somar(10, 45);

$upload = new Upload();