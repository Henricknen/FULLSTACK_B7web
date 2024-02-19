<?php

echo "<br/>---------------------------------------------------------- password hash -------------------<br/>";
$hash = password_hash("123456", PASSWORD_BCRYPT);       // para encriptografar senhas o php recomenda a função 'password_hash' que ultiliza dois parâmetros o primeiro é a senha que será criptografada e o segundo é o tipo de criptografia que será usado
echo $hash;

echo "<br/>--------------------------------------------------------------------- md5 ------------------<br/>";

echo md5("123456");     // criptografando senha ultilizando 'md5' que não é recomendado para proteger senhas, devido à natureza rápida deste algoritmo de 'hash' que não se altera quando a página é atualizada pododendo ser mais façil traduzida por diçionarios especializados a decifrá-las

echo "<br/>-------------------------------------------------------------- validação --------------------<br/>";

$hash = '$2y$10$JRcv/c1GX0WjgZlchK28LOvGu6RI.abju5stjtRYWBKy1Iltxgyuu';

$senha = '123456';
if(password_verify($senha, $hash)) {        // função 'password_verify' faz a válidação da senha, ultiliza dois parâmetros sendo o primeiro a 'senha' e o segundo o 'hash' que será verificado
    echo "Acertou...";
} else {
    echo "Errou...";
}

echo "<br/>-------------------------------------------------------------- validação em formúlario ------<br/>";

$email = 'l.henrick@live.com';
$senha = 99999;

$sql = $pdo-> prepare("SELECT * FROM usuarios WHERE email = :email");       // verificando apenas o 'email'
$sql-> bindValue(":email", $email);
$sql-> execute();

if($sql-> rowCount() > 0) {     // verificação se encontrou algum úsario com o email verificado
    $dados = $sql-> fecth();         // pegando os dados do úsuario encontrado

    if(password_verify($senha, $dados['senha'])) {      // fazendo a verificação de senha ultilizando a função 'pasword_verfy' ultilizando como parâmetro a 'senha digitada' e o 'hash' que estará salvo no banco de dados
        echo "Login realizado com sucesso...";
    } else {
        echo "Falha ao realizar login...";
    }
}

