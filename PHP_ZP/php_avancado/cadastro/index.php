<?php       // reçebendo os dados do formulário

if(isset($_POST['nome']) && !empty($_POST['nome'])) {       // verificação se 'nome' foi 'definido' e não está em 'branco'
    $nome = addcslashes($_POST['nome'], "\x00..\x1F");        // reçebendo 'nome' e 'email'
    $email = addcslashes($_POST['email'], "\x00..\x1F");

    require 'config.php';

    $pdo-> query("INSERT INTO consulta SET nome = '$nome', email = '$email'");      // inserindo usuario no banco de dados
    $id = $pdo-> lastInsertId();

    $md5 = md5($id);        // gerando um 'md5' do id do usuário
    $link = 'http://www.b7web.com.br/cadastroconfirma/confirmar.php?h='. 'md5';       // link para confirmar o cadastro

    $assunto = "Confirme o cadastro";
    $msg = "Clique no link abaixo para confirmar seu cadastro:\n\n". $link;
    $headers = "From: l.henrick@live.com\r\n";
    $headers .= "Reply-To: l.henrick@live.com\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    mail($email, $assunto, $msg, $headers);

    echo "<h2>OK!, Confirme seu cadastro agora</h2>";
}

?>

<form method="POST">        <!-- formulário de cadastro -->
    Nome:<br/>
    <input type="text" name = "nome" /><br/><br/>
    
    Email:<br/>
    <input type="email" name = "email" /><br/><br/>

    <input type="submit" value = "Cadastrar" />
</form>