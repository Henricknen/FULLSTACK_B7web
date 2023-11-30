<?php

require 'config.php';

if(!empty($_POST['nome']) && !empty($_POST['email'])) {     // verificando se formulário com campos 'nome' e 'email' foi enviados
    $nome = addslashes($_POST['nome']);     // armazendando nome reçebido na variável '$nome'
    $email = addslashes($_POST['email']);
    $id = $_SESSION['mmnlogin'];
    $senha = $email;

    $sql = $pdo-> prepare("SELECT * FROM usuarios WHERE email = :email");
    $sql-> bindValue (":email", $email);
    $sql-> execute();

    if($sql-> rowCount() == 0) {        // se não foi encontrado nenhum resultado na pesquisa
        $sql = $pdo-> prepare("INSERT INTO usuarios (id_pai, nome, email, senha) VALUES (:id_pai, :nome, :email, :senha)");     // inseri um novo usuário
        $sql-> bindValue(":id_pai", $id_pai);
        $sql-> bindValue(":nome", $nome);
        $sql-> bindValue(":email", $email);
        $sql-> bindValue(":senha", $senha);
        $sql-> execute();

        header("Location: index.php");
        exit;
    } else {
        echo "Já existe um usuáriocom este email cadastrado...";
    }
}

?>
<h1>Cadastrar novo usuário...</h1>

<form method="POST">
    Nome:<br/>
    <input typetext = "text" name = "nome"><br/><br/>
    
    E-mail:<br/>
    <input type="email" name = "email"><br/><br/>

    <input type = "submit" value = "Enviar" />
</form>