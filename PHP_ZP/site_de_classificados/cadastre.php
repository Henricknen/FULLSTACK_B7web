<?php require 'pages/header.php'; ?>
<div class = "container">
    <h1>Cadastre-se</h1>

    <?php

    require 'classes/usuario.class.php';
    $u = new Usuario();     // instançiando classe 'Usuario'
    if(isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];
        $telefone = addslashes($_POST['telefone']);

        if(!empty($nome) && !empty($email) && !empty($senha)) {     // se nome, email e senha não estiver 'vazios'
            $u-> cadastrar($nome, $email, $senha);      // será acessado o 'cadastrar' manndando estes parâmetros
        } else {
            ?>
            
            <div class="alert alert-warning">        <!-- colocando html 'fora' do php-->
                Preencha todos os campos...
            </div>
            
            <?php
        }
    }
    
    ?>

    <form method = "POST">      <!-- formulário de cadastro -->
        <div class = "form-group">
            <label for = "nome">Nome:</label>
            <input type = "text" name = "nome" id = "nome" class = "form-control" />
        </div>
        <div class = "form-group">
            <label for = "nome">E-mail:</label>
            <input type = "email" name = "email" id = "email" class = "form-control" />
        </div>
        <div class = "form-group">
            <label for = "nome">Senha:</label>
            <input type = "password" name = "senha" id = "senha" class = "form-control" />
        </div>
        <div class = "form-group">
            <label for = "nome">Telefone:</label>
            <input type = "text" name = "telefone" id = "telefone" class = "form-control" />
        </div>
        <input type = "submit" value = "Cadastrar" class = "btn btn-default" />
    </form>
</div>
<?php require 'pages/footer.php'; ?>