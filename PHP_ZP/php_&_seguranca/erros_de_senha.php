<?php 
session_start();

if(!empty($_POST['email'])) {       // se campo 'email' foi enviado
    $email = $_POST['email'];           // pega 'email'
    $senha = $_POST['senha'];               // pega 'senha'

    if(isset($_SESSION['login_tentativas']) && $_SESSION['login_tentativas'] >= 3) {        // 'limitando' a quantidade de tentativas
        echo "Seu acesso está bloqueado!";
    } else {        // para fazer as verificações o número de tentativas não pode ser maior que 3 

        if($email == 'l.henrick@live.com' && $senha == 123) {       // login fictíçio
            echo "Acesso OK";
        } else {
            if(!isset($_SESSION['login_tentativas'])) {     // se senha for incorreta será armazenada na seção 'login_tentativas'
                $_SESSION['login_tentativas'] = 0;
            }

            $_SESSION['login_tentativas']++;        // inclementa senhas incorretas

            echo "Senha incorreta! Tentativas: ". $_SESSION['login_tentativas'];        // mostra a quantidade de erros de senha
        }

    }

    echo "<hr/>";
}
?>

<form method = "POST">      <!-- formúlario basico de login -->

    Email:<br/>
    <input type = "email" name = "email" /><br/><br/>
    
    Senha:<br/>
    <input type = "password" name = "senha" /><br/><br/>

    <input type = "submit" value = "Enviar" />

</form>