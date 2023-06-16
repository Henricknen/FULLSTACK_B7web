<?php
class Post {
    public $id;
    public $id_user;
    public $type;// reçebe 'Text' ou 'Photo'
    public $created_at;
    public $body;
    }

interface PostDAO {
    public function insert(Post $p);
    public function getHomeFeed($id_user);
}