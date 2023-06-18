<?php
require_once 'models/UserRelation.php';


class UserRelationDaoMysql implements UserRelationDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this-> pdo = $driver;
    }

    public function insert(UserRelation $u) {

    }

    public function getFollowing($id) {     // lista de usuário que esse 'id' segue
        $users = [];

        $sql = $this-> pdo-> prepare("SELECT user_to FROM userrelations     
        WHERE user_from = :userfrom");

        $sql-> bindValue(':userfrom', $id);
        $sql-> execute();

        if($sql-> rowCount() > 0) {
            $data = $sql-> fetchAll();
            foreach($data as $item) {       // inseindo os 'id' na lista
                $users[] = $item['user_to'];
            }
        }

        return $users;
    }

    public function getFollowers($id) {     // lista de que segue este usuário
        $users = [];

        $sql = $this-> pdo-> prepare("SELECT user_tfrom FROM userrelations     
        WHERE user_to = :userto");

        $sql-> bindValue(':userfrom', $id);
        $sql-> execute();

        if($sql-> rowCount() > 0) {
            $data = $sql-> fetchAll();
            foreach($data as $item) {
                $users[] = $item['user_from'];
            }
        }

        return $users;
    }
}