<?php
require 'functions.php';

$erro = null;
$sucesso = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {    

    if(!empty($_POST['honeypot'])) {        // verifica se o input de name 'honeypot' não está vazio, ou seja foi preenchido
        $erro = "Ops! Robô detectado!";
    }
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input_radio</title>
</head>
<body>
    <h1>Evitando acesso não autorizado</h1>
    <form method="POST">
        <?php if (exibirErro($erro)) : ?>
            <p style="color:red">
            <?= $erro; ?>
        </p>
        <?php endif; ?>

        <?php if (exibirErro($sucesso)) : ?>
            <p style="color:green">
            </p>
        <?php endif; ?>
        <form method = "POST">

            <input type = "text" name = "nome" placeholder = "Digite seu nome" /><br />
            <input type = "text" name = "email" placeholder = "Digite seu email" /><br />
            <input type = "text" name = "menssagem" placeholder = "Digite sua menssagem" /><br />
            <input type = "hidden" name = "honeypot" value = "" />     <!-- input 'hidden' oculto -->
        
        <input type="submit" value = "Enviar">
        
        </form>
    </form>
</body>
</html>
