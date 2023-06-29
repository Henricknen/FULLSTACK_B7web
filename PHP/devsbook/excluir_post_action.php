<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/PostDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$id = filter_input(INPUT_GET, 'id');

if($id) {
    $postDao = new PostDaoMysql($pdo);      // instançiando o 'Dao'
    $postDao-> delete($id, $userInfo-> id);        // deletando o 'post'
}

header('Location: '. $base);        // volta para raiz do sistema
exit;