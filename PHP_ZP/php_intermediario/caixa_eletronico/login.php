<?php

session_start();
if(isset($_POST['agencia']) && empty($_POST['agencia'] == false)) {     // verificando se 'agencia' existe e não está vazia
    $agencia = addslashes($_POST['agencia']);       // pegando os dados enviados pelo 'form'
    $conta = addslashes($_POST['conta']);
    $senha = addslashes($_POST['senha']);
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
        <input type="text" name="Conta" /><br/><br/>

        Senha:<br/>
        <input type="password" name="senha" /><br/><br/>
        
        <input type="submit" value="Entrar" />
        
    </form>
</body>
</html>