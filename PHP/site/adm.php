<?php

include "connect.php";
SESSION_START();        // iniçia ou recupera uma sessão que está em aberto
$login = $_SESSION['login'];        // email do usuário
$senha_log = $_SESSION['password'];     // senha do usuário
$sql = mysqli_query($link, "SELECT * FROM tb_user WHERE email = '$login'");
while($line = mysqli_fetch_array($sql)) {       // 'mysqli_fetch_array' faz uma varredura na tabela
    $senha = $line['senha'];
    $nivel = $line['nivel'];
}

if($senha_log == $senha && $nivel == 1) {        // testando senha de quem está logado com senha da tabela e se o nivel é igual a 1
    
} else {
    header('location:index.php');
}

?>

<html>
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Site em PHP</title>
        <link rel = "stylesheet" type =  "text/css" href = "css/style.css">
    </head>
    <body>
        <div id="box_log">
            <h1 class = "titulos" style = "margin-left:2%">Usuário logado como: <?php echo $login; ?></h1>
            <a href = "form_postar.php" style = "margin-left:2%">Criar uma postagem</a> | <a href = "form_scriptcss.php">Criar script css</a> |
            <a href="logout.php">Sair</a>
        </div>
    </body>
</html>