<?php
require_once 'models/Post.php';
require_once 'dao/UserRelationDaoMysql.php';
require_once 'dao/UserDaoMysql.php';
require_once 'dao/PostLikeDaoMysql.php';
require_once 'dao/PostCommentDaoMysql.php';

class PostDaoMysql implements PostDAO
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this-> pdo = $driver;
    }

    public function insert(Post $post)
    {
        $sql = $this->pdo->prepare('INSERT INTO posts (id_user, type, created_at, body) VALUES (:id_user, :type, :created_at, :body)');
        $sql->bindValue(':id_user', $post->id_user);
        $sql->bindValue(':type', $post->type);
        $sql->bindValue(':created_at', $post->created_at);
        $sql->bindValue(':body', $post->body);
        $sql->execute();
    }

    public function delete($id, $id_user) {
        $sql = $this-> pdo-> prepare("DELETE FROM posts
        WHERE id = :id' AND id_user = :id_user");
        $sql-> bindValue(':id', $id);
        $sql-> bindValue(':id_user', $id_user);
        $sql-> execute();
    }

    public function getUserFeed($user_id)
    {
        $array = [];

        $sql = $this->pdo->prepare("SELECT * FROM posts WHERE id_user = :user_id ORDER BY created_at DESC");
        $sql-> bindValue(':user_id', $user_id);
        $sql-> execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            $array = $this->postListToObject($data, $user_id);
        }

        return $array;
    }

    public function getHomeFeed($user_id)
    {
        $array = [];

        $urDao = new UserRelationDaoMysql($this->pdo);
        $userList = $urDao->getFollowing($user_id);
        $userList[] = $user_id;

        $sql = $this->pdo->prepare("SELECT * FROM posts WHERE id_user IN (" . implode(',', $userList) . ") ORDER BY created_at DESC");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            $array = $this->postListToObject($data, $user_id);
        }

        return $array;
    }

    public function getPhotosFrom($user_id)
    {
        $array = [];

        $sql = $this->pdo->prepare("SELECT * FROM posts WHERE id_user = :user_id AND type = 'photo' ORDER BY created_at DESC");
        $sql->bindValue(':user_id', $user_id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll(PDO::FETCH_ASSOC);
            $array = $this->postListToObject($data, $user_id);
        }

        return $array;
    }

    private function postListToObject($post_list, $user_id)
    {
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
            $newPost->mine = ($post_item['id_user'] == $user_id);
            $newPost->user = $userDao->findById($post_item['id_user']);
            $newPost->likeCount = $postLikeDao->getLikeCount($newPost->id);
            $newPost->liked = $postLikeDao->isLiked($newPost->id, $user_id);
            $newPost->comments = $postCommentDao->getComments($newPost->id); // informações sobre comentários

            $posts[] = $newPost;
        }

        return $posts;
    }
}
