<?php 
include "connect.php";
$email = $_POST['email'];       // variável '$email' reçebe o que vem do campo email do formúlario
$senha = $_POST['senha'];

if($email != ""  && $senha != "") {     // verificando se variáveis estão preenchidas
    echo "Usuario logado";
} else {
    echo "É necessario preencher todos os campos e possuir um cadastro";
}