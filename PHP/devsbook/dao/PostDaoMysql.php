<?php
require_once 'models/Post.php';     // puxando a 'classe' e a 'interfaçe'
require_once 'dao/UserRelationDaoMysql.php';

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

        $sql = $this-> pdo-> query("SELECT * FROM posts       <!-- pegando os posts ordenados pela data -->
        WHERE id_user IN  (". implode(',', $userList).")
        ORDER BY created_at DESC");
        if($sql-> rowCount() > 0) {     // verificando se tem algum 'post'
            $data = $sql-> fetchAll(PDO:: FETCH_ASSOC);

            $array = $this-> _postListToObject($data, $id_user);      // transforma o resultado em objetos
        }

        return $array;
    }

    private function _postListToObject($post_list, $id_user) {

    }
}
