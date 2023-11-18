<?php

session_start();
require 'config.php';

if(!isset($_SESSION['logado'])) {
    header("Location: login.php");
    exit;
}