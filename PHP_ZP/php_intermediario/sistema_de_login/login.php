<?php
session_start();

if(isset($_POST['email']) && empty($_POST['email'] == false)) {     // verificando se campo 'email' existe e não está vazio
    
    $email = addslashes($_POST['email']);
    $senha = md5(addslashes($_POST['senha']));

    $conexao = "mysql:dbname=blog;host=localhost";
    $dbuser = "root";
    $dbpass = "";

    try {
        $db = new PDO($conexao, $dbuser, $dbpass);      // fazendo conexão com banco de dados

        $sql = $db-> query("SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'");

        if($sql-> rowCount() > 0) {     // verificando se 'query' retornou algum resultado

            $dado = $sql-> fetch();     // pegando o primeiro resultado

            $_SESSION['id'] = $dado['id'];      // salvando na 'seção'

            header("Location: index.php");
        }

    } catch(PDOException $e) {
        echo "Falhou: ". $e-> getMessage();
    }
}
?>

Pagina de login
<form method = "POST">
    e-mail:<br/>
    <input type = "email" name = "email" /><br/><br/>
    
    Senha:<br/>
    <input type = "password" name = "senha" /><br/><br/>

    <input type = "submit" value = "Entrar">

</form>