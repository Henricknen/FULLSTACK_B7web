<?php
require_once 'models/PostLike.php';

class PostLikeDaoMysql implements PostLikeDAO {
    private $pdo;
 
    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function getLikeCount($id_post) {
        $sql = $this-> pdo-> prepare("SELECT COUNT(*) as c FROM postlikes
        WHERE id_post = :id_post");

        $sql->bindValue(':id_post', $id_post);
        $sql->execute();

        $data = $sql-> fetch();
        return $data['c']; // Retorna a contagem de curtidas
    }

    public function isLiked($id_post, $id_user) {
        $sql = $this-> pdo-> prepare("SELECT * FROM postlikes
        WHERE id_post = :id_post AND id_user = :id_user");

        $sql-> bindValue(':id_post', $id_post);
        $sql-> bindValue(':id_user', $id_user);
        $sql-> execute();

        if ($sql->rowCount() > 0) {
            return true; // Se houver algum resultado, significa que o usuário curtiu o post
        } else {
            return false; // Se não houver resultado, significa que o usuário não curtiu o post
        }
    }

    public function liketoggle($id_post, $id_user) {
        if($this-> isLiked($id_post, $id_user)) {       // se foi dado like deleta
            $sql = $this-> pdo-> prepare("DELETE FROM postlikes
            WHERE id_post = :id_post AND id_user = :id_user");
        } else {        // se não foi enseri
            $sql = $this-> pdo-> prepare("INSERT INTO postlikes
            (id_post, id_user, created_at) VALUES
            (:id_post, :id_user, NOW())");
        }
        
        $sql-> bindValue(':id_post', $id_post);
        $sql-> bindValue(':id_user', $id_user);
        $sql-> execute();
    }

    public function deleteFromPost($id_post) {
        $sql = $this-> pdo-> prepare("SELECT * FROM postlikes WHERE id_post = :id_post");
        $sql-> bindValue(':id_post', $id_post);
        $sql-> execute();
    }
}
