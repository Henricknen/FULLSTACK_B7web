<?php
require 'config.php';

$_SESSION['token'] = '';        // zerando o 'token' da seção
header("Location: ". $base);        // redireçionando para página inçial
exit;