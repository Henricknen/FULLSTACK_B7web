<!DOCTYPE html>
    <html lang = "pt-br">
    <head>      <!-- seção de cabeçalho -->
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Site em PHP</title>
        <link rel = "stylesheet" type =  "text/css" href = "css/style.css">
    </head>
    <body>      <!-- corpo -->
    <div id = "geral">
        <div id = "topo">
            <?php include "topo.php";?>
        </div>

        <div id = "menu">
            <?php include "menu.php";?>
        </div>

        <div id = "conteudo">
        <br><br>
            <form action = "cad_contato.php" method = "POST">
                <label class = "legenda">Nome:</label><br>
                <input type = "text" name = "nome" class = "campos" placeholder = "Preencha este campo com seu nome completo"><br>

                <label class = "legenda">E-mail:</label><br>
                <input type = "email" name = "email" class = "campos" placeholder = "Digite seu email aqui..."><br>

                <label class = "legenda">Assunto:</label><br>
                <input type = "text" name = "assunto" class = "campos" placeholder = "Sobre o que deseja falar?"><br>
                
                <label class = "legenda">Conteudo:</label><br>
                <textarea name = "conteudo" class = "campos2" placeholder = "Digite em no máximo 40 caracteres o conteudo" maxlength = "140"></textarea><br>
                <input type = "submit" value = "Enviar" class = "bt_enviar">
            </form>
        </div>

        <div id = "rodape">
            <?php include "rodape.php";?>
        </div>
    </div>
    </body>
</html>