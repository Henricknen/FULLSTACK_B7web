<?php
$nome = filter_input(INPUT_POST, 'nome');     // função 'filter_input' pega os itens e verifica se o campo está preenchido
$idade = filter_input(INPUT_POST, 'idade');     // função 'filter_input' exige dois parâmetros o 1º é 'INPUT_POST' indica o tipo de método que foi usado para o envio e o 2º 'nome' é o nome do campo

if($nome && $idade) {     // verificando se '$nome' e '$idade' foi preenchido
    echo 'Nome: '. $nome. "<br>";
    echo 'Idade: '. $idade;
} else {
    header("location: index.php");      // se não haver o preenchimento, função 'header' fará um redireçionamento para a página 'index.php' e só se pode fazer está ação caso não seja enviado nenhuma informação para tela
    exit;       // 'exit' cançela a execução de tudos os codigos que houver abaixo
}