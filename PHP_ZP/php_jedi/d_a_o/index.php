<?php 
require 'classes.php';

$usuarioDAO = new UsuarioDAO();     // 'instançiando' o DAO

$novoUsuario = new Usuario(array(        // criando objeto Usuário
    'name'=> 'fulano',
    'email'=> 'l.henrick@gmail.com',
    'pass'=> md5('123')
));

$usuarioDAO-> insert($novoUsuario);     // inserindo usuário através do próprio objeto

$usuarios = $usuarioDAO-> get();        // pega todos os dados de todos os usuários

foreach($usuarios as $usuario) {
    echo "NOME: ". $usuario-> getName(). " EMAIL: ". $usuario-> getEmail();        // imprimindo o nome do usuário e email
    echo "<hr/>";
}