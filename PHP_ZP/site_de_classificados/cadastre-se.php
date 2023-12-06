<?php require 'pages/header.php'; ?>
<div class = "container">
    <h1>Cadastre-se</h1>

    <?php

    require 'classes/usuario.class.php';
    $u = new Usuarios();     // instançiando classe 'Usuario'
    if(isset($_POST['nome']) && !empty($_POST['nome'])) {
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];
        $telefone = addslashes($_POST['telefone']);

        if(!empty($nome) && !empty($email) && !empty($senha)) {     // se nome, email e senha não estiver 'vazios'
            if($u-> cadastrar($nome, $email, $senha, $telefone)) {      // será acessado o 'cadastrar' mandando estes parâmetros
                ?>
                    <div class = "alert alert-success">
                        <strong>Parabéns!</strong> Cadastrado com sucesso... <a href = "login.php" class = "alert-link">Faça o login agora</a>
                    </div>
                <?php
            } else {
                ?>
                    <div class = "alert alert-warning">
                        Este usuário já existe... <a href=  "login.php">Faça o login agora</a>
                    </div>
                <?php
            }
        } else {
            ?>            
                <div class = "alert alert-warning">        <!-- colocando menssagem html de aviso 'fora' do php-->
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