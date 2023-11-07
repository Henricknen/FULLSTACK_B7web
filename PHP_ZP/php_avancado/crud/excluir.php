<?php

include 'contato.class.php';
$contato = new Contato();

if(!empty($_GET['id'])) {       // verificando se foi reçbido um 'id'
    
    $id = $_GET['id'];       // salvando 'id' na variável '$id'

    $contato-> excluir($id);        // ultilizando função 'excluir' para eclir contato com 'id' espeçifico

}

header("Location: index.php");      // entrando no 'if' ou não, será retornado para o 'index'