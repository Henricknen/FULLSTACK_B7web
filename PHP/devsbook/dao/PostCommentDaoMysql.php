<?php
require_once 'models/PostComment.php';
require_once 'dao/UserDaoMysql.php';

class PostCommentDaoMysql implements PostCommentDAO {
    
    private $pdo;
 
    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function getComments($id_post) {
        $array = [];

        $sql = $this-> pdo-> prepare("SELECT * FROM postcomments
        WHERE id_post = :id_post");

        $sql-> bindValue(':id_post', $id_post);
        $sql-> execute();

        if ($sql-> rowCount() > 0) {     // verificando se tem algum comentário
            $data = $sql-> fetchAll(PDO:: FETCH_ASSOC);

            $userDao = new UserDaoMysql($this-> pdo);

            foreach ($data as $item) {
                $commentItem = new PostComment();
                $commentItem-> id = $item['id'];
                $commentItem-> id_post = $item['id_post'];
                $commentItem-> id_user = $item['id_user'];
                $commentItem-> body = $item['body'];
                $commentItem-> created_at = $item['created_at'];
                $commentItem-> user = $userDao-> findById($item['id_user']);        // pega todas informações do usuário pelo 'id'

                $array[] = $commentItem;        // adiçionando as informações do usuário no 'array'
            }
        }

        return $array;
    }

    public function addComments(PostComment $pc) {      // inserindo o comentario na tabela 'postcomments' do banco de dados
        $sql = $this-> pdo-> prepare("INSERT INTO postcomments
        (id_post, id_user, body, created_at) VALUES
        (:id_post,:id_user,:body, :created_at)");
        
        $sql-> bindValue(':id_post', $pc-> id_post);
        $sql-> bindValue(':id_user', $pc-> id_user);
        $sql-> bindValue(':body', $pc-> body);
        $sql-> bindValue(':created_at', $pc-> created_at);
        $sql-> execute();
    }

}
