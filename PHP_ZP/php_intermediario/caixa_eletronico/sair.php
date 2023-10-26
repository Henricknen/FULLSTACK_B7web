<?php
session_start();

unset($_SESSION['banco']);      // 'unset' destroi a seção
header("Location: index.php");
exit;