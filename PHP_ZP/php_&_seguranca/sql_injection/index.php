<?php
echo "método addslashes<br/>";
$email = addslashes($_POST['email']);      // método 'addslashes' é uma proteção que anula as aspas 'evitando' ataques sql injection
$senha = addslashes($_POST['senha']);

$pdo = new PDO("mysql:dbname=seg_injection;host=localhost", "root", "");        // conexão com banco de dados

$sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";         // query verifica se email e senha estão 'corretos'
$sql = $pdo-> query($sql);

if($sql-> rowCount() > 0) {
    echo "usuário logado...<br/>";
} else {
    echo "errou email/senha...<br/>";
}

echo "<hr/>ultilizando PDO<br/>";

$email = $_POST['email'];
$senha = $_POST['senha'];

$pdo = new PDO("mysql:dbname=seg_injection;host=localhost", "root", "");

$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
$sql = $pdo-> prepare($sql);
$sql-> bindValue(':email', $email);
$sql-> bindValue(':senha', $senha);
$sql-> execute();

if($sql-> rowCount() > 0) {
    echo "usuário logado...<br/>";
} else {
    echo "errou email/senha...<br/>";
}