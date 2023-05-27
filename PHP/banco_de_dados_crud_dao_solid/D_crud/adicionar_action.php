<?php
require 'config.php';       // puxando arquivo de conexão com banco de dados

$name = filter_input(INPUT_POST, 'name');        //pegando o item 'nome'
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);      // pegando item 'email' e ultilizando filtro 'FILTER_VALIDATE_EMAIL'

if($name && $email) {       // verificação se '$name' e '$email' eestão corretos

    // $sql = $pdo-> query("INSERT INTO  usuarios (nome, email) VALUES ('$nome', '$email')");      // inserindo no banco de dados ultilizando método 'query'

    $sql = $pdo-> prepare("SELECT * FROM usuarios WHERE email = :email");        // verificando se 'email' está cadastrado
    $sql-> bindValue('email', $email);
    $sql-> execute();

    if($sql-> rowCount() === 0) {      // 'rowCount' mostra quantos regitros vieram da consulta
        $sql = $pdo-> prepare("INSERT INTO  usuarios (nome, email) VALUES (:name, :email)");        // inseção no banco ultilizzando método 'prepare'
        $sql-> bindValue(':name', $name);     // assoçiações de cada item ultilizando método 'bindValue'
        $sql-> bindValue(':email', $email);
        $sql-> execute();       // fazendo a execução

        header("Location: index.php");      // 'depois de adiçionado é retornado para o 'index.php'
        exit;
    } else {
        header("Location: adicionar.php");
        exit;
    }
} else {        // se '$name' e '$email' não estiverem corretos
    header("Location: adicionar.php");      // 'header' faz voltar para a página espeçificada em 'Location'
    exit;
}