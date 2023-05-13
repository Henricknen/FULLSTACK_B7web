<?php

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);        // 'FILTER_SANITIZE_SPECIAL_CHARS' transforma a informação o que está sendo reçebida em texto

$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);     // reçebendo o campo 'email' parâmetro 'FILTER_VALIDATE_EMAIL' faz a validação se o que está sendo reçebido é um 'email'

$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_NUMBER_INT);     // 'FILTER_SANITIZE_NUMBER_INT' elimina todos tipos de caracteres deixando só os 'numeros'


// $idade = filter_input(INPUT_POST, 'idade', FILTER_VALIDATE_INT);      // validando se foi enviado a informação correta com 'FILTER_VALIDATE_INT'
// $sobrenome = 'Ferreira';
// filter_var($sobrenome, "Filtro")     // 'filter_var' serve para validar uma informação já existente


// FILTER_VALIDATE_EMAIL
// FILTER_VALIDATE_FLOAT
// FILTER_VALIDATE_INT
// FILTER_VALIDATE_IP      // para verificar se foi reçebido um endereço de 'ip' correto
// FILTER_VALIADE_URL          // para verificar se foi reçebido um 'link real'




// FILTER_SANITIZE_EMAIL   // remove tudo o que 'não partiçipar' de um email
// FILTER_SANITIZE_STRING      // remove tudo, deixando somente 'string'
// FILTER_SANITIZE_SPECIAL_CHARS
// FILTER_SANITIZE_URL
// FILTER_SANITIZE_NUMBER_FLOAT
// FILTER_SANITIZE_NUMBER_INT


if($nome && $email && $idade) {       // verificando se 'nome', 'email' e '$idade' foi validado 

    echo 'Nome: '. $nome. "<br>";

    echo 'Email: '. $email. "<br>";

    echo 'Idade: '. $idade;

} else {

    header("location: index.php");

    exit;

}