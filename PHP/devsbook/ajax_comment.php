<?php

require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/PostCommentDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$id = filter_input(INPUT_POST, 'id');       // pegando o 'id'
$txt = filter_input(INPUT_POST, 'txt');       // pegando o 'txt'

$array = [];

if($id && $txt) {       // verificando se foi reçebido o 'id' e o 'txt'
    $postCommentDao = new PostCommentDaoMysql($pdo);

    $newComment = new PostComment();        // preenchendo o model 'PostComment' com os dados
    $newComment-> id_post = $id;
    $newComment-> id_user = $userInfo-> id;
    $newComment-> body = $txt;
    $newComment-> created_at = date('Y-m-d H:i:s');

    $postCommentDao-> addComments($newComment);     // adiçionando novo comentário

    $array = [      // 'array' que retorna os dados
        'error' => '',
        'link' => $base. '/perfil.php?id='. $userInfo-> id,
        'avatar' => $base. '/media/avatars/'. $userInfo-> avatar,
        'name' => $userInfo-> name,
        'body' => $txt
    ];
}

header("Content-Type: application/ json");
echo json_encode($array);       // retornando o 'array' transformando em 'json'
exit;