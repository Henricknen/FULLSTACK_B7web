<?php
require "usuarios.php";

$u = new Usuarios();         // instanciando a classe 'Usuarios'

$u->excluir(20);         // chamando o método 'excluir' para deletar o usuário com ID 20

// $u->atualizar("lhsf@hotmail.com", "123", 17);         // atualizando dados do usuário com ID 17

// $u->inserir("lhsf@hotmail.com", "123");       // Inserindo um novo usuário

// $res = $u->selecionar(11);        // retornando os dados do usuário com ID 11
// print_r($res);

?>
