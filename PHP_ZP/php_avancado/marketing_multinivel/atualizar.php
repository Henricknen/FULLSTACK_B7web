<?php
session_start();
require 'config.php';
require 'funcoes.php';

$sql = "SELECT id FROM usuarios";     // query pega todos 'id' dos usuários do sistema
$sql = $pdo-> query($sql);
$usuarios = array();

if($sql-> rowCount() > 0) {     // verificando se query deu algum retorno
    $usuarios = $sql-> fetchAll();
    foreach($usuarios as $chave => $usuario) {
        $usuarios[$chave]['filhos'] = calcularCadastros($usuario['id'], $limite);
    }
}

$sql = "SELECT * FROM patentes ORDER BY min DESC";        // 'pegando' a lista das patentes e 'ORDER BY' ordena a patente da maior pra menor
$sql = $pdo-> query($sql);
$patentes = array();
if($sql-> rowCount() > 0) {     // se retorna algum 'resultado'
    $patentes = $sql-> fetchAll();      // os mesmos serão adiçionado na variável '$patentes'
}

foreach($usuarios as $usuario) {
    foreach ($patentes as $patente) {       // 'percorrendo' todas as patentes
        if(intval($usuario['filhos']) >= intval($patente['min'])) {     // se a quantidade de cadastro que o usuário tem for maior ou igual ao minimo requirido pra determinada patente
            
            $sql = "UPDATE usuarios SET patente = :patente WHERE id = :id";     // 'atualizando' as patentes dos usuários cadastrados
            $sql = $pdo-> prepare($sql);
            $sql-> bindValue(":patente", $patente['id']);
            $sql-> bindValue(":id", $usuario['id']);
            $sql-> execute();

            break;
        }
    }
}