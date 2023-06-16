<?php
require_once 'models/UserRelation.php';

class UserRelationDaoMysql implements UserRelationDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this-> pdo = $driver;
    }

    public function insert(UserRelation $u) {

    }

    public function getRelationsFrom($id) {
        $users = [$id];     // criando um array com o proprio 'id'

        $sql = $this-> pdo-> prepare("SELECT user_to FROM userrelations     
        WHERE user_from = :userfrom");

        $sql-> bindValue(':userfrom', $id);
        $sql-> execute();

        if($sql-> rowCount() > 0) {
            $data = $sql-> fetchAll();
            foreach($data as $item) {       // inseinro os 'id' na lista
                $users[] = $item['user_to'];
            }
        }

        return $users;
    }
}