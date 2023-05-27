<?php
require 'config.php';

$id = filter_input( INPUT_GET, 'id');       // reçebendo 'id' via 'get'
if($id) {       // verificando se foi enviado algun dado para 'id'

    $sql = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");        // criando a 'query' de exclusão
    $sql-> bindValue(':id', $id);       // substituindo ':id' por '$id'
    $sql-> execute();

}

header("Location: index.php");      // se encontrar ou não encontrar o 'id', o usúario será encaminhado para o 'index.php'
exit;