<?php
if(!empty($_GET['n1']) && !empty($_GET['n2']) && !empty($_GET['op'])) {     // verificando se 'n1', 'n2' e 'op' não estão vazios
    
    $n1 = floatval($_GET['n1']);      // armazenando os dados pego do formulário em variáveis;
    $n2 = floatval($_GET['n2']);            // função 'floatval' transforma um texto em um numero flutuante 'ex: 6.5'
    $op = $_GET['op'];

    switch($op) {
        case '-':
            $conta = $n1 - $n2;     // variável '$conta' reçebendo operação de 'subtração'
            echo $n1. " - ". $n2. " = ". $conta;
            break;
        case '+':
            $conta = $n1 + $n2;     // variável '$conta' reçebendo operação de 'adição'
            echo $n1. " + ". $n2. " = ". $conta;
            break;
        case '*':
            $conta = $n1 * $n2;     // variável '$conta' reçebendo operação de 'multiplicação'
            echo $n1. " * ". $n2. " = ". $conta;
            break;
        case '/':
            $conta = $n1 / $n2;     // variável '$conta' reçebendo operação de 'divisão'
            echo $n1. " / ". $n2. " = ". $conta;
            break;
    }

} else {
    header("Location: index.php");
}

?>