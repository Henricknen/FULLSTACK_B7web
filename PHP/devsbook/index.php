<?php
require 'config.php';
require 'models/Auth.php';

$auth = new Auth($pdo, $base);     // instançiando 'Auth'