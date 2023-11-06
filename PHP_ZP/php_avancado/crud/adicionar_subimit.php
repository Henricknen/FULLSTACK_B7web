<?php

include 'contato.class.php';
$contato = new Contato();       // instançiando a classe 'Contato'

if(!empty($_POST['email'])) {        // verifiando se foi reçebido dados
    $nome = $_POST['nome'];     // adiçionando os dados em variáveis
    $email = $_POST['email'];

    $contato-> adicionar($email, $nome);        // adiçionando no banco de dados

    header("Location: index.php");
}