<?php
require_once 'models/Post.php';     // puxando a 'classe' e a 'interfaçe'
require_once 'dao/UserRelationDaoMysql.php';
require_once 'dao/UserDaoMysql.php';

class PostDaoMysql implements PostDAO
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    public function insert(Post $p)
    {
        $sql = $this->pdo->prepare('INSERT INTO posts (       <!-- fazendo inserção na tabela post do banco de dados -->
            id_user, type, created_at, body
        ) VALUES(
            id_user, type, created_at, body
        )');

        $sql->bindValue(':id_user', $p->id_user);
        $sql->bindValue(':type', $p->type);
        $sql->bindValue(':created_at', $p->created_at);
        $sql->bindValue(':body', $p->body);
        $sql->execute();
    }

    public function getHomeFeed($id_user) {
        $array = [];

        $urDao = new UserRelationDaoMysql($this-> pdo);       // pegando a lista os usuário que forem seguidos
        $userList = $urDao->getRelationsFrom($id_user);      // pegando as relações que tem

        $sql = $this-> pdo-> query("SELECT * FROM posts
        WHERE id_user IN  (". implode(',', $userList).")
        ORDER BY created_at DESC");
        if($sql-> rowCount() > 0) {     // verificando se tem algum 'post'
            $data = $sql-> fetchAll(PDO:: FETCH_ASSOC);

            $array = $this-> _postListToObject($data, $id_user);      // transforma o resultado em objetos
        }

        return $array;
    }

    private function _postListToObject($post_list, $id_user) {
        $posts = [];
        $userDao = new UserDaoMysql($this->pdo);

        foreach($post_list as $post_item) {
            $newPost = new Post();      // instançiando 'Post'
            $newPost-> id = $post_item['id'];       // peenchendo '$newPost'
            $newPost-> type = $post_item['type'];
            $newPost-> created_at = $post_item['created_at'];
            $newPost-> body = $post_item['body'];
            $newPost-> mine = false;

            if($post_item['id_user'] == $id_user) {     // verificando se o usuário que fez o post é do mesmo usuário que está logado
                $newPost-> mine = true;
            }

            $newPost-> user = $userDao-> findById($post_item['id_user']);       // pegando as informações do usuário

            $newPost-> likeCount = 0;       // informações sobre like
            $newPost-> liked = false;

            $newPost-> comments = [];       //in formações sobre comentarios

            $post[] = $newPost;
        }

        return $posts;      // rretornando os proprios 'posts'
    }
}
