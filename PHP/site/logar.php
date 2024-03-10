<?php 
include "connect.php";
$email = $_POST['email'];       // variável '$email' reçebe o que vem do campo email do formúlario
$senha = $_POST['senha'];

if($email != ""  && $senha != "") {     // verificando se variáveis estão preenchidas
    // echo "Usuario logado";
    $sql = mysqli_query($link, "SELECT * FROM tb_user WHERE email = '$email'");     // trazendo todos os campos da tabela 'tb_user' onde o campo 'email' é igual ao '$email' forneçido pelo usúario
    $registro = mysqli_num_rows($sql);      // função 'mysqli_num_rows' verifica quantas linhas foi encontrada
    echo $registro; 
} else {
    echo "É necessario preencher todos os campos e possuir um cadastro";
}