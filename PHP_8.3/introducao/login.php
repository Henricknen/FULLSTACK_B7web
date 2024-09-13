<?php 

$usuario_correto = 'admin';
$senha_correta = 654321;

$usuario = 'admin';     // valor digitado pelo usuário
$senha = 123456;

if($usuario == $usuario_correto && $senha == $senha_correta) {
    echo 'login realizado com sucesso...';      // se usuário e senha do sistema for igual ao digitado pelo usuário
} elseif($usuario == $usuario_correto && $senha != $senha_correta) {
    echo 'Senha Incorreta...';
} else {        // se '$senha' estiver correta
    echo 'Nome de usuário incorreto...';
}