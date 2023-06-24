<?php
require_once 'models/PostLike.php';

class PostLikeDaoMysql implements PostLikeDAO {     // implementando a interfaçe 'PostLikeDAO' de PostLike.php
    private $pdo;
 
    public function __construct(PDO $driver) {
        $this-> pdo = $driver;
    }

    public function getLikeCount($id_post) {
        $sql = $this-> pdo-> prepare("SELECT COUNT(*) as c FROM postlikes       <!-- pegando a quantidade de likes que determinado 'post' tem -->
        WHERE id_post = :id_post");

        $sql-> bindValue(':id_post', $id_post);
        $sql-> execute();

        $data = $sql-> fetch();
        return $data['c'];
    }

    public function isLiked($id_post, $id_user) {

    }

    public function liketoggle($id_post, $id_user) {

    }
}