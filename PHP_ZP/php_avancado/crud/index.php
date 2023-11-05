<?php

include 'contato.class.php';        // incluindo o arquivo 'contato.class.php'

$contato = new Contato();       // intançiando a classe 'Contato' em um objeto chamado '$contato'

$contato-> adicionar('l.henrick@live.com', 'Luis Henrique Silva Ferreira');     // 'criando' contato
$contato-> adicionar('l.henrick@live.co', 'LHSF');

$nome = $contato-> getNome('l.henrick@live.com');       // pegando nome do contato cujo 'email' está sendo passado como parâmetro
echo "Nome: ". $nome. "<br/>";

$lista = $contato-> getAll();       // pegando a lista 'total' dos contatos
print_r($lista);        // 'print_r' para mostrar o array inteiro

?>