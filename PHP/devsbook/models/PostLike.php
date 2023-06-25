<?php
class PostLike {
    public $id;     // colunas
    public $id_post;
    public $id_user;
    public $create_at;
}

interface PostLikeDAO {     // interfaçe 'PostLikeDAO' contém as ações que o Dao do PostDao preçisa ter
    public function getLikeCount($id_post);     // função pega a quantidade de 'like' que tem determinado 'post'
    public function isLiked($id_post, $id_user);         // função retorna se usuário de 'like' no post
    public function liketoggle($id_post, $id_user);         // função que da efetivamente o 'like'
    
}

