<?php

include "connect.php";
SESSION_START();        // iniçia ou recupera uma sessão que está em aberto
$login = $_SESSION['login'];        // email do usuário
$senha_log = $_SESSION['password'];     // senha do usuário
$sql = mysqli_query($link, "SELECT * FROM tb_user WHERE email = '$login'");
while($line = mysqli_fetch_array($sql)) {       // 'mysqli_fetch_array' faz uma varredura na tabela
    $senha = $line['senha'];
    $nivel = $line['nivel'];
    $foto = $line['foto'];
    $id = $line['id_user'];
    $nome = $line['nome'];
}

if($senha_log == $senha && $nivel > 1) {        // testando senha de quem está logado com senha da tabela e se o nivel é igual a 1
    
} else {
    header('location:index.php');
}

?>

<html>
    <head>
        <title>Site em PHP</title>
        <link rel = "stylesheet" type =  "text/css" href = "css/style.css">
    </head>
    <body>
        <div id="box_log">
            <h1 class = "titulos" style = "margin-left:2%">Usuário logado como: <?php echo $login; ?></h1>
            <h1 class = "titulos" style = "margin-left:2%">Nome do usuário: <?php echo $nome; ?></h1>
            <a href = "index.php" style = "margin-left:2%">Ir para Home</a> |
            <a href="logout.php">Sair</a>
            <img src = "<?php echo "user/user$id/$foto";?>" style = "float:right;width:80px;height:auto;margin:-20px 5px 0 0;">
        </div>
    </body>
</html>