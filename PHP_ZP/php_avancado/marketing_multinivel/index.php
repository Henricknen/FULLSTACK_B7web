<?php
session_start();
require 'config.php';

if(empty($_SESSION['mmnlogin'])) {          // verificando se a seção está vazia ou não existir
    header("Location: login.php");      // redireçiona o usuário para página de login
    exit;
}

$id = $_SESSION['mmnlogin'];

$sql = $pdo-> prepare("SELECT nome FROM usuarios WHERE id = :id");      // puchando nome do usuário logado através do 'id'
$sql-> bindValue(":id", $id);
$sql-> execute();

if($sql-> rowCount() > 0) {     // verificando se encontrou algum resultado
    $sql = $sql-> fetch();
    $nome = $sql['nome'];
} else {
    header("Location: login.php");
    exit;
}
?>

<h1>Sistema de Marketing Multinível...</h1>
<h2>Usuário logado: <?php echo $nome; ?></h2>

<a href=  "cadastro.php">Cadastrar novo usuário</a>

<a href="sair.php">Sair</a>