<?php
require_once 'models/PostComment.php';

class PostCommentDaoMysql implements PostCommentDAO {
    private $pdo;
 
    public function __construct(PDO $driver) {
        $this-> pdo = $driver;
    }

    public function getComments($id_post) {
        $array = [];

        return $array;
    }

    public function addComments(PostComment $pc) {

    }

}
