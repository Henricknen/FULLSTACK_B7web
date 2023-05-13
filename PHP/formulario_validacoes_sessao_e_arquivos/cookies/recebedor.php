<?php
session_start();        // 'session_start();' é necessario para página que vai trabalhar com seção

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);        // 'FILTER_SANITIZE_SPECIAL_CHARS' transforma está informações em texto
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);     // reçebendo o campo 'email' parâmetro 'FILTER_VALIDATE_EMAIL' faz a validação se o que está sendo enviado é um 'email'
$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);     // 'FILTER_SANITIZE_NUMBER_INT' elimina todos tipos de caracters deixando só os 'numeros'


if($nome && $email && $idade) {       // se 'nome', 'email' e '$idade' for validado

    $expiracao = time() + (86400 * 30);     // validade do 'cookie' será de '1 dia * 30'
            // nome , valor, tempo de expiração  
    setcookie('nome', $nome, $expiracao);        // função 'setcookie' define um 'cookie'

    echo 'Nome: '. $nome. "<br>";
    echo 'Email: '. $email. "<br>";
    echo 'Idade: '. $idade;

} else {
    $_SESSION['aviso'] = 'Preencha corretamente os dados...';
    header("location: index.php");
    exit;
}