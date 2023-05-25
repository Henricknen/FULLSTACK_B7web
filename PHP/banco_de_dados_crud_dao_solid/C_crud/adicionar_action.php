<?php
require 'config.php';       // puxando arquivo de conexão com banco de dados

$name = filter_input(INPUT_POST, 'name');        //pegando o item 'nome'
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);      // pegando item 'email' e ultilizando filtro 'FILTER_VALIDATE_EMAIL'

if($name && $email) {       // verificação se '$name' e '$email' eestão corretos

    // $sql = $pdo-> query("INSERT INTO  usuarios (nome, email) VALUES ('$nome', '$email')");      // inserindo no banco de dados ultilizando método 'query'

    $sql = $pdo-> prepare("INSERT INTO  usuarios (nome, email) VALUES (:name, :email)");        // inseção no banco ultilizzando método 'prepare'
    $sql-> bindValue(':name', $name);     // assoçiações de cada item ultilizando método 'bindValue'
    $sql-> bindValue(':email', $email);
    $sql-> execute();       // fazendo a execução

    header("Location: index.php");      // 'depois de adiçionado é retornado para o 'index.php'
    exit;

} else {        // se '$name' e '$email' não estiverem corretos
    header("Location: adicionar.php");      // 'header' faz voltar para a página espeçificada em 'Location'
    exit;
}