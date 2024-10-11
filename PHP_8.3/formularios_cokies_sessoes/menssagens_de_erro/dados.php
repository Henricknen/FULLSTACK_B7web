<?php

if(!empty($_POST['login']) && ($_POST['password'])) {       // se 'login' e 'password' não estiver vazios
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    $menssagem = null;      // variável menssagem inicia nula
    if($login == 'admin' && $password == 'admin') {     // 'verificação' de login e password
        $menssagem = "Você foi logado com sucesso...";
    } else {
        $menssagem = "Usuário ou Senha inválidos";
    }

    // echo "O seu login é ". $login. ' e a senha é '. $password;
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menssagem de erros</title>
</head>
<body>
    <form action = "dados.php" method = "POST">
        <input type = "text" name = "login" placeholder = "Digite o login">
        <br>
        <input type = "password" name = "password" placeholder = "Digite a senha">
        <input type = "submit" value = "Enviar">

        <?php       // abrindo php 'dentro' de html
            if(!empty($menssagem)) {     // se variável $menssagem não estiver vazia
                echo $menssagem;
            }
        ?>

    </form>
</body>
</html>