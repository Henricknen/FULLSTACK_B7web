<?php
session_start();
require 'config.php';

if(empty($_SESSION['mmnlogin'])) {          // verificando se a seção está vazia ou não existir
    header("Location: login.php");      // redireçiona o usuário para página de login
    exit;
}