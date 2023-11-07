<?php

include 'contato.class.php';
$contato = new Contato();

if(!empty($_POST['id'])) {      // verificando se tem 'id'
    $nome = $_POST['nome'];         // pegando 'nome'
    $email = $_POST['email'];           // pegando 'email'
    $id = $_POST['id'];         // pegando 'id'

    if(!empty($email)) {        // verificação se email está 'preenchido'
        $contato-> editar($nome, $email, $id);
    }

    header("Location: index.php");
}