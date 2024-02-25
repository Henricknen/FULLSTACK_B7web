<!DOCTYPE html>
    <html lang = "pt-br">
    <head>      <!-- seção de cabeçalho -->
        <meta charset = "UTF-8">
        <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Site em PHP</title>
        <link rel = "stylesheet" type =  "text/css" href = "css/style.css">     <!-- folha de estilo externa -->
    </head>
    <body>      <!-- corpo -->
    <div id = "geral">
        <div id = "topo">
            <?php include "topo.php";?>     <!-- 'incluindo' o arquivo topo.php -->
        </div>

        <div id = "menu">
            <?php include "menu.php";?>
        </div>

        <div id = "conteudo">
            conteudo
        </div>

        <div id = "rodape">
            <?php include "rodape.php";?>
        </div>
    </div>
    </body>
</html>