<?php
$senha = '1234';

$hash = password_hash($senha, PASSWORD_DEFAULT);      // função 'password_hash' com dois parâmetro 1º é a senha e 2º é o tipo de processo 'PASSWORD_DEFAULT' que será ultilizando para fazer o 'enclipte' gerando um 'hash' do conviniente para o momento
$hash_ = password_hash($senha, PASSWORD_BCRYPT);            // o método 'PASSWORD_BCRYPT' gera um 'hash' de 60 caracteres
$hash__ = md5($senha);      // 'md5' gera um 'hash' para a senha, de 32 caracteres

echo "Senha original: ". $senha. "<br>";
echo "Hash PASSWORD_DEFAULT: ". $hash. "<br>";
echo "Hash PASSWORD_BCRYPT: ". $hash_. "<br>";
echo "Ultilizando 'md5': ". $hash__. "<br>";


// fazendo uma verificação

$hash = '$2y$10$VjR23b2Oie1rWfoeP3T5.uymNaus/BzIdxrfcTvX.RWlf7M4GHzNK';     // 'hash' que pode estar salvo em algum lugar
$senha ='1234';     // 'senha' digitada pelo usuário

if(password_verify($senha, $hash)) {        // função 'password_verify' verifica se a senha digitada pelo usuário é igual ao 'hash'
    echo "Senha correta!<br>";
} else {
    echo "Senha errada!<br>";
}

if(md5($senha) == $hash) {      // fazendo verificação do 'md5'
    echo "Senha correta!<br>";
} else {
    echo "Senha errada!<br>";
}