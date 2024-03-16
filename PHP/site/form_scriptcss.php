<!DOCTYPE html>
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
}

if($senha_log == $senha && $nivel == 1) {        // testando senha de quem está logado com senha da tabela e se o nivel é igual a 1
    
} else {
    header('location:index.php');
}

?>
    <html lang = "pt-br">
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Site em PHP</title>
        <link rel = "stylesheet" type =  "text/css" href = "css/style.css">
    </head>
    <body>
        <div id="box_form">
            <h1 class = "titulos" style = "margin-left:10%">Formulário de script css</h1>
            <form action = "postar_script.php" method = "POST" enctype = "multipart/form-data">
                <input type = "text" name = "titulo" class = "campos_cad" placeholder = "Digite o título da postagem">
                <input type = "file" name = "foto" class = "campos_cad">
                <textarea name = "conteudo" class ="campos" placeholder = "Digite aqui o conteúdo em até 300c..." style = "height:300px" maxlength = "300"></textarea>
                <div id = "botoes">
                    <input type = "submit" value = "Publicar" class = "bt_cad">
                    <input type = "reset" value = "Limpar" class = "bt_cad">
                </div>
            </form>

            <div class = "botoes">
                <a href = "index.php" class = "form_link">&larr; Voltar para página prinçipal</a>
                <a href = "form_postar.php" class = "form_link" style = "margin-left:20px">Ir para form postar &rarr;</a>
            </div>
        </div>
    </body>