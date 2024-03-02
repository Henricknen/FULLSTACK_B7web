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
            <h1 class = "titulos" style = "margin-left:10%">Cadastra-se</h1>       <!-- ultilizando 'css inline' para inserir uma margem de 10% no título -->
            <form action = "cadastrar.php" method = "POST" enctype = "multipart/form-data">     <!-- formulário para usuário prencher para cadastrar-se -->
                <input type = "text" name = "nome" class = "campos_cad" placeholder = "Nome">
                <input type = "email" name = "email" class = "campos_cad" placeholder = "Email">
                <input type = "password" name = "senha" class = "campos_cad" placeholder = "Senha">
                <input type = "password" name = "reptsenha" class = "campos_cad" placeholder = "Confirmar senha">
                <input type = "text" name = "lembrete" class = "campos_cad" placeholder = "Lembrete">
                <input type = "file" name = "foto" class = "campos_cad">
                <div id = "botoes">
                    <input type = "submit" value = "Cadastrar" class = "bt_cad">
                    <input type = "reset" value = "Limpar" class = "bt_cad">
                </div>
            </form>

            <div class = "botoes">
                <a href = "index.php" class = "form_link">&larr; Voltar para página prinçipal</a>       <!-- '&larr' é uma entidade html que representa uma seta apontada para esquerda -->
                <p class = "p_form">Já possui cadastro? Clique no link abaixo para fazer o login</p>
                <a href = "login.php" class = "form_link">Logar</a>     <!-- link para usuário cadastrado 'logar' -->
            </div>
        </div>
    </body>