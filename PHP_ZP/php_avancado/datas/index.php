<?php
require 'Tempo.class.php';

$t = '2019-01-13 17:00:00';
$data = date('d/m/Y H:i:s', strtotime($t));

echo $data.'<br/>foi há '.Tempo::diferenca($t).' atrás';