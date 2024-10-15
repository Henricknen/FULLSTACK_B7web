<?php
session_start();        // para trabalhar com session

unset($_SESSION['usuario']);

header('location:index.php');