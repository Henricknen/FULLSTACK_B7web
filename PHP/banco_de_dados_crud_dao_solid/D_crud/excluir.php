<?php
require 'config.php';

$id = filter_input( INPUT_GET, 'id');       // pegando o 'id' via 'GET'
if($id) {       // verificando o 'id'para fazer o processo de exclusão

    $sql = $pdo-> prepare("DELETE FROM usuarios WHERE id = :id");        // query de exclusão
    $sql-> bindValue(':id', $id);
    $sql-> execute();

}

header("Location: index.php");
exit;