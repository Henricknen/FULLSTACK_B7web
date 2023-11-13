<?php

require 'config.php';

$h = $_GET['h'];

if(!empty($h)) {

    $pdo-> query("UPDATE consulta SET status = '1' WHERE MD5($id) = '$h'");

    echo '<h2>Cadastro confirmado...</h2>';
}

?>