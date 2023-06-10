<?php
require 'config.php';
require 'models/Auth.php';

$auth = new Auth($pdo, $base);     // instançiando 'Auth'
$userInfo = $auth-> checkToken();       // 'checkToken' retorna as informações do usuário

echo 'Index';