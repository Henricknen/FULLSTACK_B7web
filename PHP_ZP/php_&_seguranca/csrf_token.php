<?php

session_start();        // iniçiando uma seção
if(!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = md5(time() . rand(0, 999));      // se não existir o 'csrf_token' é criado um com código aleatório
}

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['csrf_token'])) {       // verifica se o método de requisição é POST e se o campo 'csrf_token' foi enviado
    if(isset($_SESSION['csrf_token']) && $_POST['csrf_token'] == $_SESSION['csrf_token']) {       // para fazer login o que 'for enviado' pelo formúlario tem que ser igual a 'seção'
        $email = isset($_POST['email']) ? $_POST['email'] : "";
        $senha = isset($_POST['password']) ? $_POST['password'] : "";

        if($email == 'l.henrick@live.com' && $senha == 123) {       // verificação de login
            echo "Acesso OK!";
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Este formulário foi enviado de outro site!";
    }
}  

?>


<form method = "POST">      <!-- formúlario de login -->
    E-mail:<br/>
    <input type = "email" name = "email" /><br/><br/>

    Senha:<br/>
    <input type = "password" name = "password"><br/><br/>

    <input type = "hidden" name = "csrf_token" value = "<?php echo $_SESSION['csrf_token']; ?>" />      <!-- campo oculto conténdo a seção 'crsf_token' -->

    <input type = "submit" value = "Eviar" />
</form>