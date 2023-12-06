<?php require 'pages/header.php'; ?>
<div class = "container">
    <h1>Login</h1>

    <?php

    require 'classes/usuario.class.php';
    $u = new Usuarios();     // instançiando classe 'Usuario'
    if(isset($_POST['email']) && !empty($_POST['email'])) {
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];        
    }
    
    ?>

    <form method = "POST">      <!-- formulário de login -->
        <div class = "form-group">
            <label for = "nome">E-mail:</label>
            <input type = "email" name = "email" id = "email" class = "form-control" />
        </div>
        <div class = "form-group">
            <label for = "nome">Senha:</label>
            <input type = "password" name = "senha" id = "senha" class = "form-control" />
        </div>
        <input type = "submit" value = "Fazer Login" class = "btn btn-default" />
    </form>
</div>
<?php require 'pages/footer.php'; ?>