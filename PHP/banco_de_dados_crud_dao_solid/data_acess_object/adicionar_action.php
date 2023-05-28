<?php
require 'config.php';       // puxando arquivo de conexão com banco de dados
require 'dao/UsuarioDaoMysql.php';      // puxando 'UsuarioDaoMysql.php' da pasta 'dao'

$usuarioDao = new UsuarioDaoMysql($pdo);        // instançiando 'usuarioDao'

$name = filter_input(INPUT_POST, 'name');        //pegando o item 'nome'
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);      // pegando item 'email' e ultilizando filtro 'FILTER_VALIDATE_EMAIL'

if($name && $email) {       // verificação se '$name' e '$email' eestão corretos

    if($usuarioDao-> findByEmail($email) === false) {       // se encontrar não '$email' retorna 'false', e permite fazer a adição do usuário
        $novoUsuario = new Usuario();       // será criado o '$novoUsuario
        $novoUsuario-> setNome($name);
        $novoUsuario-> setEmail($email);

        $usuarioDao -> add($novoUsuario);

        header("Location: index.php");      // 'depois de adiçionado é retornado para a página 'index.php'
        exit;
    } else {
        header("Location: adicionar.php");      // se já estiver um email cadastrado o usuário será redireçionado para página 'adicionar.php'
        exit;
    }
}