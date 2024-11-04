<?php
session_start();

if (!empty($_SESSION['saldo'])) {
    echo 'Seu saldo é: ' . $_SESSION['saldo'];
}
