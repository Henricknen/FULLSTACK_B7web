<?php
session_start();        // criando 'seção' para verificar usuário logado

if(isset($_SESSION['id']) && empty($_SESSION['id']) == false) {      // verificando se seção existe e não está vazia
    echo "Area restrita...";
} else {
    header("Location: login.php");
}

?>