<?php
require_once 'models/Post.php';
require_once 'dao/UserRelationDaoMysql.php';
require_once 'dao/UserDaoMysql.php';
require_once 'dao/PostLikeDaoMysql.php';
require_once 'dao/PostCommentDaoMysql.php';

class PostDaoMysql implements PostDAO
{
    private $pdo;

    public function __construct(PDO $driver) {
        $this-> pdo = $driver;
    }

    public function insert(Post $post) {
        $sql = $this->pdo->prepare('INSERT INTO posts (id_user, type, created_at, body) VALUES (:id_user, :type, :created_at, :body)');
        $sql->bindValue(':id_user', $post->id_user);
        $sql->bindValue(':type', $post->type);
        $sql->bindValue(':created_at', $post->created_at);
        $sql->bindValue(':body', $post->body);
        $sql->execute();
    }

    public function delete($id, $id_user) {
        $postLikeDao = new PostLikeDaoMysql($this-> pdo);       // puxando o 'Dao' de like
        $postCommentDao = new PostCommentDaoMysql($this-> pdo);     // puxando o 'Dao' de comentarios

        // verificação se o 'post' existe
        $sql = $this-> pdo-> prepare("DELETE FROM posts     
        WHERE id = :id AND id_user = :id_user");
        $sql-> bindValue(':id', $id);
        $sql-> bindValue(':id_user', $id_user);
        $sql-> execute();

        if($sql-> rowCount() > 0) {     // verificando se existe algum registro
            $post = $sql-> fetch(PDO:: FETCH_ASSOC);        // pegando o 'post'

            $postLikeDao-> deleteFromPost($id);     // deleta 'likes'
            $postCommentDao->deleteFromPost($id);       // deleta 'comentarios'

            if($post['type'] === 'photo') {     // deleta o arquivo de 'type photo'
                $img = 'media/iploads/'. $post['body'];
                if(file_exists($img)) {
                    unlink($img);       // 'unlink' deleta
                }
            }
                    // deleta o 'post' todo
            $sql = $this-> pdo-> prepare("DELETE FROM posts
            WHERE id = :id AND id_user = :id_user");
            $sql-> bindValue(':id', $id);
            $sql-> bindValue(':id_user', $id_user);
            $sql-> execute();
        }

    }

    public function getUserFeed($id_user) {
        $array = ['feed'=> array( )];
        $perPage = 4;

        $page = intval(filter_input(INPUT_GET, 'p'));
        if($page < 1) {
            $page = 1;
        }

        $sql = $this->pdo->prepare("SELECT * FROM posts
        WHERE id_user = :id_user
        ORDER BY created_at DESC LIMIT $offset, $perPage");
        $sql-> bindValue(':id_user', $id_user);
        $sql-> execute();

        if ($sql->rowCount() > 0) {
            $data = $sql-> fetchAll(PDO::FETCH_ASSOC);
            $array['feed'] = $this-> postListToObject($data, $id_user);
        }
        
        $sql = $this->pdo->prepare("SELECT COUNT (*) as c * FROM posts
        WHERE id_user = :id_user");
        $sql-> bindValue(':id_user', $id_user);
        $sql-> execute();
        $totalData = $sql-> fetch();
        $total = $totalData['c'];
        
        $array['pages'] = ceil($total / $perPage);
        $array['currentPage'] = $page;

        return $array;
    }

    public function getHomeFeed($id_user) {
        $array = [];
        $perPage = 4;       // variável '$perpage' define o limite de 'post'

        $page = intval(filter_input(INPUT_GET, 'p'));
        if($page < 1) {
            $page = 1;
        }
        
        $offset = ($page - 1) * $perPage;

        $urDao = new UserRelationDaoMysql($this->pdo);      // pega a lista dos usuários seguidos
        $userList = $urDao-> getFollowing($id_user);
        $userList[] = $id_user;

        $sql = $this-> pdo-> query("SELECT * FROM posts
        WHERE id_user IN (" . implode(',', $userList) . ")
        ORDER BY created_at DESC LIMIT $offset, $perPage");      // apresenta o tanto de 'post' que for definido na variável '$perpage'
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql-> fetchAll(PDO:: FETCH_ASSOC);
            $array['feed'] = $this-> postListToObject($data, $id_user);     // transforma o resultado em objetos
        }
                // pegando o total de 'post'
        $sql = $this-> pdo-> query("SELECT COUNT(*) as c FROM posts
        WHERE id_user IN (" . implode(',', $userList) . ")");
        $totalData = $sql-> fetch();
        $total = $totalData['c'];

        $array['pages'] = ceil($total / $perPage);      // encontrando quantas páginas tem, 'ceil' faz o arredondamento para cima

        $array['currentPage'] = $page;

        return $array;
    }

    public function getPhotosFrom($id_user) {
        $array = [];

        $sql = $this->pdo->prepare("SELECT * FROM posts
        WHERE id_user = :id_user AND type = 'photo'
        ORDER BY created_at DESC");

        $sql->bindValue(':id_user', $id_user);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            $array = $this->postListToObject($data, $id_user);
        }

        return $array;
    }

    private function postListToObject($post_list, $id_user) {
        $posts = [];
        $userDao = new UserDaoMysql($this->pdo);
        $postLikeDao = new PostLikeDaoMysql($this->pdo);
        $postCommentDao = new PostCommentDaoMysql($this->pdo);

        foreach ($post_list as $post_item) {
            $newPost = new Post();
            $newPost->id = $post_item['id'];
            $newPost->type = $post_item['type'];
            $newPost->created_at = $post_item['created_at'];
            $newPost->body = $post_item['body'];
            $newPost->mine = ($post_item['id_user'] == $id_user);
            $newPost->user = $userDao->findById($post_item['id_user']);
            $newPost->likeCount = $postLikeDao->getLikeCount($newPost->id);
            $newPost->liked = $postLikeDao->isLiked($newPost->id, $id_user);
            $newPost->comments = $postCommentDao->getComments($newPost->id); // informações sobre comentários

            $posts[] = $newPost;
        }

        return $posts;
    }
}
