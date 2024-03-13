<?php 

SESSION_START();        // recuperando a sessão
unset($_SESSION['login']);        // 'unset' remove as definições que foram aplicadas na sessão 'login'
unset($_SESSION['password']);
header('location:index.php');

?>