<?php
class PostComment {
    public $id;
    public $id_post;
    public $id_user;
    public $created_at;
    public $body;
}

interface PostCommentDAO {
    public function getComments($id_post);       // função pegará os comentarios
    public function addComments(PostComment $pc);       // função que adiçionará comentarios
}

