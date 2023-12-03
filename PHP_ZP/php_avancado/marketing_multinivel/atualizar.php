<?php
session_start();
require 'config.php';
require 'funcoes.php';

$sql = "SELECT id FROM usuarios";     // query pega 'todos' usuários do sistema
$sql = $pdo-> query($sql);
$usuarios = array();

if($sql-> rowCount() > 0) {     // verificando se query deu algum retorno
    $usuarios = $sql-> fetchAll();
    foreach($usuarios as $chave=> $usuario) {
        $usuarios[$chave]['filhos'] = calcularCadastros($usuario['id'], $limite);
    }
}

echo '<pre>';
print_r($usuarios);