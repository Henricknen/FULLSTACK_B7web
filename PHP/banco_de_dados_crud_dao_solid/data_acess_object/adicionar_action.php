<?php
require 'config.php';       // puxando arquivo de conexão com banco de dados

$name = filter_input(INPUT_POST, 'name');        //pegando o item 'nome'
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);      // pegando item 'email' e ultilizando filtro 'FILTER_VALIDATE_EMAIL'

if($name && $email) {       // verificação se '$name' e '$email' eestão corretos


    $sql = $pdo-> prepare("SELECT * FROM usuarios WHERE email = :email");       // verificando se o email já está cadastrado cadastrado
    $sql-> bindValue(':email', $email);
    $sql-> execute();

    if($sql-> rowCount() === 0) {       // 'rowCount' mostra quantos registros veio da consulta

        $sql = $pdo-> prepare("INSERT INTO  usuarios (nome, email) VALUES (:name, :email)");        // inseção no banco ultilizando método 'prepare'
        $sql-> bindValue(':name', $name);     // associação dos valores aos parâmetros, ultilizando método 'bindValue'
        $sql-> bindValue(':email', $email);
        $sql-> execute();       // fazendo a execução

        header("Location: index.php");      // 'depois de adiçionado é retornado para a página 'index.php'
        exit;
    } else {
        header("Location: adicionar.php");      // 'header' faz voltar para a página espeçificada em 'Location'
        exit;
    }
} else {        // se não estiver corretos
    header("Location: adicionar.php");      // 'header' faz voltar para a página espeçificada em 'Location'
    exit;
}