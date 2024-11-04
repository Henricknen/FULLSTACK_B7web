<?php
session_start();
$_SESSION['user'] = 'Alessandro';
$_SESSION['saldo'] = 51000;
echo 'Saldo Resetado';
