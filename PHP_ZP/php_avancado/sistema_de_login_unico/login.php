<?php
session_start();
require 'config.php';

$_SESSION['lg'] = '';

if(isset($_POST['email']) && !empty($_POST['email'])) {		// se 'email' foi enviado e não está vazio
	$email = $_POST['email'];
	$senha = $_POST['senha'];

	$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";		// verificação
	$sql = $pdo-> prepare($sql);
	$sql-> bindValue(":email", $email);
	$sql-> bindValue(":senha", $senha);
	$sql-> execute();

	if($sql-> rowCount() > 0) {		// verificando se houve 'resultado' da consulta
		$sql = $sql-> fetch();
		$id = $sql['id'];		// pegando o 'id' do usuário
		$ip = $_SERVER['REMOTE_ADDR'];		// 'REMOTE_ADDR' variável que pega o 'ip' do cliente que está acesaando o servidor web

		$_SESSION['lg'] = $id;

		$sql = "UPDATE usuarios SET ip = :ip WHERE id = :id";		// Atualiza a tabela 'usuarios' definindo o campo 'ip' para um valor específico, com base no 'id'
		$sql = $pdo-> prepare($sql);
		$sql-> bindValue(":ip", $ip);
		$sql-> bindValue(":id", $id);
		$sql-> execute();

		header("Location: index.php");
		exit;
	}
}

?>
<h1>Login</h1>		<!-- formulário de 'login' -->
<form method = "POST">
	E-mail:<br/>
	<input type = "email" name = "email" /><br/><br/>

	Senha:<br/>
	<input type = "password" name = "senha" /><br/><br/>

	<input type = "submit" value = "Entrar" />
</form>