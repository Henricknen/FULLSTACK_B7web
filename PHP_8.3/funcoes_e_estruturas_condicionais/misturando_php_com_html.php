<?php
    $versao = 8.3;      // definindo a variável '$versão' fora do html
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserindo php em html</title>
</head>
<body>
    <h1>Codificando PHP</h1>
    <h2>

        <?php       // 'abre' o php dentro do html
        echo "Estou utilizando a versão ". $versao;     // 'echo' faz a impressão da versão que está sendo utilizada
        ?>

    </h2>
</body>
</html>