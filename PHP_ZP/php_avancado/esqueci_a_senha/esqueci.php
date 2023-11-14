<?php
require 'config.php';

if (!empty($_POST['email'])) {      // Verificando se 'email' foi enviado pelo formulário

    $email = $_POST['email'];

    $sql = "SELECT * FROM usuarios WHERE email = :email";       // verificando 'email' existe na tabela 'usuarios' do banco de dados
    $sql = $pdo->prepare($sql);
    $sql->bindValue(":email", $email);
    $sql->execute();

    if($sql-> rowCount() > 0) {     // se existir algum 'dado'
        $sql = $sql-> fetch();
        $id = $sql['id'];

        $token = md5(time(). rand(0, 9999));        // é gerado um 'token' aleatório

        $sql = "INSERT INTO usuario_token (id_usuario, hash, expirado_em) VALUES (:id_usuario, :hash, :expirado_em)";       // inserindo token na tabela 'usuario_token' do banco de dados
        $sql = $pdo-> prepare($sql);
        
        $sql-> bindValue(":id_usuario", $id);
        $sql-> bindValue(":hash", $token);
        $sql-> bindValue(":expirado_em", date('Y-m-d H:i', strtotime('+2 months')));
        $sql-> execute();

        $link = "https://localhost/FULLSTACK_B7web/PHP_ZP/php_avancado/esqueci_a_senha/redefinir.php?token=". $token;

        $menssagem = "Clique no link para redefinir sua senha:</br>". $link;
        $assunto = "Redefinição de senha";
        $headers = 'From: l.henrick@live.com'. "\r\n". 'X-Mailer: PHP'. phpversion();       // enviando 'headers' cabeçalho para o email espeçificado

        // mail($email, $assunto, $menssagem, $headers);       // função 'mail' envia o email
        echo $menssagem;
        exit;        
    }

}
?>

<form method = "POST">
    Qual seu e-mail?<br/>
    <input type = "email" name = "email" /><br/>

    <input type = "submit" value = "Enviar" />
</form>