<?php
require 'config.php';       // puxando arquivo de conexão com banco de dados

$id = filter_input(INPUT_POST, 'id');        //pegando o item 'id'
$name = filter_input(INPUT_POST, 'name');        //pegando o item 'nome'
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);      // pegando item 'email' e ultilizando filtro 'FILTER_VALIDATE_EMAIL'

if($name && $email) {       // verificação se '$name' e '$email' estão corretos

    $sql = $pdo-> prepare("UPDATE * FROM usuarios SET nome = :name, email = :email WHERE id = :id");        // 'query' de atualização
    $sql-> bindValue(':name', $name);
    $sql-> bindValue(':email', $email);
    $sql-> bindValue(':id', $id);
    $sql->execute();

    header("Location: index.php");
    exit;

} else {        // se não estiver corretos
    header("Location: adicionar.php");      // 'header' faz voltar para a página espeçificada em 'Location'
    exit;
}