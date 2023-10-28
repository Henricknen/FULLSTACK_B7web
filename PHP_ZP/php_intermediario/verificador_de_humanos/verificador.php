<?php

session_start();        // iniçiando a seção

if(!empty($_POST['n'])) {       // verificando se usuário enviou o número

    $n = intval($_POST['n']);       // pegando o número digitado pelo usuário
    if($_SESSION['v'] == $n) {
        echo "Humano...";      // se número digitado pelo usuário for igual ao número salvo na seção
    } else {
        echo "Fake...";        // se o número digitado for diferente
    }
} else {
    header("Location: index.php");
}

?>