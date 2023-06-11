<?php
require 'config.php';       // puchando 'config.php' que tem a conexão com banco de dados
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cadastro</title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/login.css" />
</head>
<body>
    <header>
        <div class="container">
            <a href="<?=$base;?>"><img src="<?=$base;?>/assets/images/devsbook_logo.png" /></a>
        </div>
    </header>
    <section class="container main">
        <form method="POST" action="<?=$base;?>/signup_action.php">
            <?php if(!empty($_SESSION['flash'])): ?>
                <?= $_SESSION['flash'];?>
                <?= $_SESSION['flash'] = ''; ?>
            <?php endif; ?>

            <input placeholder="Digite seu Nome Completo" class="input" type="text" name="name" />

            <input placeholder="Digite seu E-mail" class="input" type="email" name="email" />

            <input placeholder="Digite sua Senha" class="input" type="password" name="password" />

            <input placeholder="Digite sua Data de Nascimento" class="input" type="text" name="birthdate" id="birthdate" />

            <input class="button" type="submit" value="Fazer cadastro" />

            <a href="<?=$base;?>/login.php">Já tem conta? Faça login</a>
        </form>
    </section>

    <script src = "https://unpkg.com/imask"></script>       <!-- plugin javascript 'imask'  é usado para criar e aplicar máscaras em campos de entrada -->
    <script>
        IMask(      // função 'IMask' ultiliza dois parâmentros
            document.getElementById("birthdate"),       // 1º campo a qual será colcado o efeito
            {mask: '00/00/0000'}        // 2º máscara de uma data
        );
    </script>
</body>
</html>