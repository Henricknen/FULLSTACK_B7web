<?php

include 'contato.class.php';        // incluindo o arquivo 'contato.class.php'

$contato = new Contato();       // intançiando a classe 'Contato' em um objeto chamado '$contato'

        // CREATE
$contato-> adicionar('l.henrick@live.com', 'Luis Henrique Silva Ferreira');     // 'criando' contato
$contato-> adicionar('l.henrick@live.co', 'LHSF');
$contato-> adicionar('l.henrick@hotmail.com', 'email inexistente');

        // READ
$nome = $contato-> getNome('l.henrick@live.com');       // pegando nome do contato cujo 'email' está sendo passado como parâmetro
echo "Nome: ". $nome. "<br/>";

$lista = $contato-> getAll();       // pegando a lista 'total' dos contatos
print_r($lista);        // 'print_r' para mostrar o array inteiro

        // UPDATE
$contato-> editar('Full Stack', 'l.henrick@live.co');       // atualizando nome para 'Full Stack' no contato de email 'l.henrick@live.co'

$nome = $contato-> getNome('l.henrick@live.co');
echo "Programador: ". $nome. "<br/>";

        // DELETE
$excluir = $contato-> excluir('l.henrick@hotmail.com');        // variável '$excluir' com uma chamada de exclusão, exçluindo contato pelo 'email' passado como parâmetro

if($excluir == true) {      // verificação de 'exclusão'
    echo "foi excluido com sucesso...";
} else {
    echo "Não houve exclusão...";
}

?>