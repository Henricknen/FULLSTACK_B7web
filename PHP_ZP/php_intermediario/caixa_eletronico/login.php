<?php

session_start();
require 'config.php';       // chamando o arquivo de conexão com banco de dados

if(isset($_POST['agencia']) && empty($_POST['agencia'] == false)) {     // verificando se 'agencia' existe e não está vazia
    $agencia = addslashes($_POST['agencia']);       // pegando os dados enviados pelo 'form'
    $conta = addslashes($_POST['conta']);
    $senha = addslashes($_POST['senha']);

    $sql = $pdo-> prepare("SELECT * FROM contas WHERE agencia = :agencia AND conta = :conta AND senha = :senha");
    $sql-> bindValue(":agencia", $agencia);
    $sql-> bindValue(":conta", $conta);
    $sql-> bindValue(":senha", md5($senha));        // tranformando senha em 'md5'
    $sql-> execute();

    if($sql-> rowCount() > 0) {      // verificando se encontrou alguma conta
        $sql = $sql-> fetch();

        $_SESSION['banco'] = $sql['id'];        // adiçionando o 'id' a seção
        header("Location: index.php");
        exit;
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Login</title>
</head>
<body>
    <form method="POST">
        Agência:<br/>
        <input type="text" name="agencia" /><br/><br/>
        
        Conta:<br/>
        <input type="text" name="conta" /><br/><br/>

        Senha:<br/>
        <input type="password" name="senha" /><br/><br/>
        
        <input type="submit" value="Entrar" />
        
    </form>
</body>
</html>