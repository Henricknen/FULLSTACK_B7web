<?php

if(isset($_POST['nome']) && !empty($_POST['nome'])) {       // se 'nome' existe e não está vazio

    $nome = addslashes($_POST['nome']);     // armazenando o valor do campo nome enviado via POST na variável '$nome'
    $email = addslashes($_POST['email']);
    $msg = addslashes($_POST['msg']);

    $para = "l.henrick@live.com";       // 'destinatário' do email
    $assunto = "Pergunta do Contato";       // assunto do email
    $corpo = "nome: ". $nome. "E-mail: ". $email. "Menssagem: ". $msg;      // corpo contém as informações que o usuário enviar
    $cabecalho = "From: l.henrick@live.com". "\r\n".        // quem enviou o email
                "Reply-To: ". $email. "\r\n".       // 'Reply-To' encaminha a resposta para que enviou o email
                "X-Mailer: PHP/". phpversion();         // qual sistema que enviou o email

    mail($para, $assunto, $corpo, $cabecalho);       // função 'mail' faz o envio do email

    echo "<h2>E-mail enviado com sucesso</h2>";
    exit;

}

?>

<form action="" method="POST">      <!-- formulario de contato -->
    Nome: <br/>
    <input type="text" name="nome" /><br><br>
    
    E-mail: <br/>
    <input type="email" name="email" /><br><br>
    
    Menssagem: <br/>
    <textarea name="msg"></textarea><br><br>

    <input type="submit" value="Enviar" />
</form>