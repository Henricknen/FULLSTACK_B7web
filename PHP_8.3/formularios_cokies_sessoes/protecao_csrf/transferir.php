<?php
session_start();
if (empty($_SESSION['user'])) {     // se não tiver user autenticado, ele vai dar erro
    die('Usuário não autenticado');
}

$crsf = $_SESSION['csrf_token'];
if($_GET['crsf_token'] != $crsf) {      // se '$crsf_token' da seção for diferente do '$crsf'
    die('CSRF TOKEN não é valido!');
}

$contaDestino = $_GET['conta_destino'];     // se tiver, ele faz a transferencia
$valor = $_GET['valor'];
$_SESSION['saldo'] -= $valor;
echo "Olá, " . $_SESSION['user'] . ". Transferência de R$ $valor para a conta $contaDestino realizada com sucesso.";
echo '<br /> Seu novo saldo é: ' . $_SESSION['saldo'];
