<?php
try {
	$pdo = new PDO("mysql:dbname=projeto_login_ajax;host=localhost", "root", "");		// conexão com bd
} catch(PDOException $e) {
	echo "ERRO: ".$e-> getMessage();
	exit;
}

if(isset($_POST['email']) && !empty($_POST['email'])) {		// verificando se email foi 'enviado' e se esta 'preenchido'

	$email = $_POST['email'];		// aramazenando 'email' e 'senha' reçebido em variáveis
	$senha = $_POST['senha'];

	$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";		// verificação na tabela 'usuarios' do banco de dados
	$sql = $pdo-> prepare($sql);
	$sql-> bindValue(":email", $email);
	$sql-> bindValue(":senha", md5($senha));
	$sql-> execute();

	if($sql-> rowCount() > 0) {		// verificando se teve algum resultado
		echo "Usuário logado com sucesso!";
	} else {
		echo "E-mail e/ou senha estão errados!";
	}

} else {
	echo "Digite um e-mail e/ou senha!";
}