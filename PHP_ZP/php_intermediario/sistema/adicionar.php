<?php
require 'config.php';

if(isset($_POST['nome']) && empty($_POST['nome']) == false) {      // se 'existir' um '$_POST' com o campo nome e ele não estiver 'vazio' é sinal que o formulario foi enviado
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);        // pegando informações que usuário digitou
    $senha = md5(addslashes($_POST['senha']));

    $sql = "INSERT INTO usuarios SET nome = '$nome', email = '$email', senha = '$senha'";       // inserido informações do 'usuario' no banco de dados
    $pdo-> query($sql);

    header("Location: index.php");      // retornando para página 'index'
}
?>

<form method = "POST">      <!-- formulario para preencher dados do usuário -->
    Nome:<br/>
    <input type = "text" name = "nome"><br/><br/>
    E-mail:<br/>
    <input type = "text" name = "email"><br/><br/>
    Senha:<br/>
    <input type = "password" name = "senha"><br/><br/>

    <input type = "submit" value = "Cadastrar">
</form>