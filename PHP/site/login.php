<!DOCTYPE html>
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
            <h1 class = "titulos" style = "margin-left:10%">Tela de Login</h1>
            <form action = "logar.php" method = "POST" enctype = "multipart/form-data">
                <input type = "email" name = "email" class = "campos_cad" placeholder = "Email">
                <input type = "password" name = "senha" class = "campos_cad" placeholder = "Senha">
                <div id = "botoes">
                    <input type = "submit" value = "Logar" class = "bt_cad">
                    <input type = "reset" value = "Limpar" class = "bt_cad">
                </div>
            </form>

            <div class = "botoes">
                <a href = "index.php" class = "form_link">&larr; Voltar para página prinçipal</a>
                <p class = "p_form">Ainda não possui o cadastro? Então clique no link abaixo para fazer seu cadastro</p>
                <a href = "login.php" class = "form_link">Logar</a>
            </div>
        </div>
    </body>