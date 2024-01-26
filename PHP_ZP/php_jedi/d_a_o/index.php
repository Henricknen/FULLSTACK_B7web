<?php 
require 'classes.php';

$usuarioDAO = new UsuarioDAO();     // 'instançiando' o DAO
$usuarios = $usuarioDAO-> get();        // pega todos os dados de todos os usuários

foreach($usuarios as $usuario) {
    echo "NOME: ". $usuario-> getName(). "EMAIL: ". $usuario-> getEmail();        // imprimindo o nome do usuário
    echo "<hr/>";
}