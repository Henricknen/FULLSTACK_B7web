<?php
session_start();
require 'config.php';

if(empty($_SESSION['lg'])) {        // se 'lg' estiver vazio(não existir seção) será redireçionado para 'login.php'
	header("Location: login.php");
	exit;
} 
?>
<h1>Conteúdo Confidencial</h1>