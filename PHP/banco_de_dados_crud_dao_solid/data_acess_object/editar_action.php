<?php
require 'config.php';       // puxando arquivo de conexão com banco de dados
require 'dao/UsuarioDaoMysql.php';      // puxando 'UsuarioDaoMysql.php' da pasta 'dao'

$usuarioDao = new UsuarioDaoMysql($pdo);        // instançiando 'usuarioDao'

$id = filter_input(INPUT_POST, 'id');        //pegando o item 'id'
$name = filter_input(INPUT_POST, 'name');        //pegando o item 'nome'
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);      // pegando item 'email' e ultilizando filtro 'FILTER_VALIDATE_EMAIL'

if($id && $name && $email) {       // verificação se '$name' e '$email' estão corretos
    $usuario = $usuarioDao-> findById($id);     // pega os dados do banco de dados
    // $usuario = new Usuario();
    // $usuario-> setId($id);
    $usuario-> setNome($nome);      // alteração do 'nome'
    $usuario-> setEmail($email);        // alteração do 'email'

    $usuarioDao-> update( $usuario );

    header("Location: index.php");
    exit;

} else {        // se não estiver corretos
    header("Location: editar.php?id=".$id);      // 'header' faz voltar para a página espeçificada em 'Location'
    exit;
}