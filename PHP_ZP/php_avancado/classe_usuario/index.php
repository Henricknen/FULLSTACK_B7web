<?php

require "usuario.php";

// $usuario = new Usuario();       // instanciando classe 'Usuario'
// $usuario-> setNome('Luis henrique silva ferreira');     // setando informações 'basicas' do usuário
// $usuario-> setEmail('l.henrick@live.com');
// $usuario-> setSenha('123');
// $usuario-> salvar();

echo "usario salvo com sucesso...". "<br>";

$usuario = new Usuario(1);      // mostrando informações de usuário de 'id' igual a 1 na tela
echo "Meu nome é: ". $usuario-> getNome(). "<br>";

$usuario = new Usuario(1);          // atualizando informações do usuário
$usuario-> setNome("LHSF");
$usuario-> salvar();

echo "Usuário alterado com sucesso...". "<br>";

$usuario = new Usuario(3);      // 'deletando' usuário de 'id' 3
$usuario-> delete();

echo "Usuário deletado com sucesso...";

?>