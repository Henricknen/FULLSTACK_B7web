<?php

session_start();
require 'config.php';

if(!empty($_POST['nome']) && !empty($_POST['email'])) {     // verificando se usuário enviou o formulário com os campos 'email' e 'nome' prenchdos
    $nome = addslashes($_POST['nome']);     // armazendando nome reçebido na variável '$nome'
    $email = addslashes($_POST['email']);
    $id_pai = $_SESSION['mmnlogin'];
    $senha = $email;

    $sql = $pdo-> prepare("SELECT * FROM usuarios WHERE email = :email");       // verificando se 'email' já está cadastrado
    $sql-> bindValue (":email", $email);
    $sql-> execute();

    if($sql-> rowCount() == 0) {        // se não foi encontrado nenhum resultado 'email' cadastrado
        $sql = $pdo-> prepare("INSERT INTO usuarios (id_pai, nome, email, senha) VALUES (:id_pai, :nome, :email, :senha)");     // inseri um novo usuário na tabela do bd
        $sql-> bindValue(":id_pai", $id_pai);
        $sql-> bindValue(":nome", $nome);
        $sql-> bindValue(":email", $email);
        $sql-> bindValue(":senha", $senha);
        $sql-> execute();

        header("Location: index.php");
        exit;
    } else {
        echo "[Já existe um usuário com este email cadastrado]";
    }
}

?>
<h1>Cadastrar novo usuário</h1>

<form method="POST">
    Nome:<br/>
    <input type = "text" name = "nome"><br/><br/>
    
    E-mail:<br/>
    <input type = "email" name = "email"><br/><br/>

    <input type = "submit" value = "Enviar" />
</form>