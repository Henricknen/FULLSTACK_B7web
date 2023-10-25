<?php
session_start();        // verificando se usuário está logado
require 'config.php';

if(empty($_SESSION['logado'])) {
	header("Location: login.php");
	exit;
}

$email = '';
$codigo = '';

$sql = "SELECT email, codigo FROM usuarios WHERE id = '".addslashes($_SESSION['logado'])."'";     // ultilizando a 'SESSION' que está armazenada com o id do usuário logado para pegar o 'email'
$sql = $pdo->query($sql);
if($sql->rowCount() > 0) {
	$info = $sql->fetch();
	$email = $info['email'];
	$codigo = $info['codigo'];
}
?>
<h1>Área interna do sistema</h1>
<p>Usuário: <?php echo $email; ?> - <a href="sair.php">Sair</a></p>
<p>Link: http://localhost/projeto_registroporconvite/cadastrar.php?codigo=<?php echo $codigo; ?></p>