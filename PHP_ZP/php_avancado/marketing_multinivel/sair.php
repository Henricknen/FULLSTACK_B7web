<?php
session_start();
unset($_SESSION['mmnlogin']);       // destruindo a sessão
header("Location: login.php");
exit;