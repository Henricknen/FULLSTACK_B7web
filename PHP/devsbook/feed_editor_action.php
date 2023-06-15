<?php

// use DeepCopy\Filter\Filter;

require 'config.php';
require 'models/Auth.php';
require 'dao/PostDaoMysql.php';     // puxando o 'dao'

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$body = filter_input(INPUT_POST, 'body');       // pegando o 'body'

if($body) {
    $postDao = new PostDaoMysql($pdo);      // instançiando o 'dao'

    $newPost = new Post();        // criando novo objeto 'post'
    $newPost-> id_user = $userInfo-> id;
    $newPost-> type = 'text';
    $newPost-> created_at = date('Y-m-d H:i:s');
    $newPost-> body = $body;

    $postDao-> insert($newPost);        // inseerindo atraves do 'dao'
}

header('Location: '. $base);        // depois de inseri volta para o '$base'
exit;