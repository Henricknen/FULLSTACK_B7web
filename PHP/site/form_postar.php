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
            <h1 class = "titulos" style = "margin-left:10%">Formulário de postagens</h1>
            <form action = "logar.php" method = "POST" enctype = "multipart/form-data">
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
            </div>
        </div>
    </body>