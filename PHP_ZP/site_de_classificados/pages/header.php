<?php require'config.php'; ?>
<!DOCTYPE html>
<html>
    <title>Classificados</title>
    <link rel = "stylesheet" href = "assets/css/bootstrap.min.css" />       <!-- puchando bootstrap de 'css' -->
    <link rel = "stylesheet" href = "assets/css/style.css" />
    <script type = "text/javascript" src = "assets/js/jquery.min.js"></script>
    <script type = "text/javascript" src = "assets/js/bootstrap.min.js"></script>     <!-- puchando bootstrap de 'js' -->
    <script type = "text/javascript" src = "assets/js/script.js"></script>
</head>
<body>
    <nav class = "navbar navbar-inverse">
        <div class = "container-fluid">
            <div class = "navbar-header">
                <a href = "./" class = "navbar-brand">Classificados</a>
            </div>
            <ul class = "nav navbar-nav navbar-right">     <!-- colocando botões do lado direito da tela -->
                <?php if(isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])): ?>     <!-- verificando se usuário está logado -->
                    <li><a href = "anuncios.php">Meus Anúncios</a></li>     <!-- se usuário estiver logado aparecerá estes botões -->
                    <li><a href = "sair.php">Sair</a></li>
                <?php else: ?>      <!-- se não estiver aparecerá esses botões -->
                    <li><a href = "cadastre-se.php">Cadastre-se</a></li>
                    <li><a href = "login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>

    </nav>