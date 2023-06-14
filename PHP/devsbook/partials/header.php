<?php
$firstName = current(explode(' ', $userInfo-> name));       // sepando o nome, 'current' pega o primeiro nome
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1"/>
    <link rel="stylesheet" href="<?=$base;?>/assets/css/style.css" />
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <a href="<?=$base;?>"><img src="<?=$base;?>/assets/images/devsbook_logo.png" /></a>
            </div>
            <div class="head-side">
                <div class="head-side-left">
                    <div class="search-area">
                        <form method="GET" action=" <?=$base;?>/search.php">        <!-- busca que o usuário fizer será enviado para o arquivo 'search.php' -->
                            <input type="search" placeholder="Pesquisar" name="s" />
                        </form>
                    </div>
                </div>
                <div class="head-side-right">
                    <a href="<?=$base;?>/perfil.php" class="user-area">
                        <div class="user-area-text"><?=$firstName;?></div>        <!--- '$userInfo-> name;' ultilizando nome do usuario cadastrado no banco de dadados -->
                        <div class="user-area-icon">
                            
                            <img src="media/avatars/avatar.jpg" />
                            
                        </div>
                    </a>
                    <a href="<?=$base;?>/logout.php" class="user-logout">
                        <img src="<?=$base;?>/assets/images/power_white.png" />
                    </a>
                </div>
            </div>
        </div>
    </header>
    <section class="container main">        <!-- iniçiando 'container main' prinçipal -->