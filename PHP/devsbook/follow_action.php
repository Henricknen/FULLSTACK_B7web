<?php
require_once 'config.php';
require_once 'models/Auth.php';
require_once 'dao/UserRelationDaoMysql.php';
require_once 'dao/UserDaoMysql.php';

$auth = new Auth($pdo, $base);
$userInfo = $auth->checkToken();

$id = filter_input(INPUT_GET, 'id');       // pegando o 'id'

if($id) {
    $userRelationDao = new UserRelationDaoMysql($pdo);
    $userDao = new UserDaoMysql($pdo);

    if($userDao-> findById($id)) {
        $relation = new UserRelation();
        $relation-> user_from = $userInfo-> id;
        $relation-> user_to = $id;

        if($userRelationDao-> isFollowing($userInfo-> id, $id)) {
            $userRelationDao-> delete($relation);
        } else {
            $userRelationDao-> insert($relation);
        }

        header("Location: perfil.php?id=". $id);
        exit;
    }
}

header('Location: '. $base);        // só vai para página iniçial caso o 'id' naõ exista
exit;