<?php
class UserRelation {        // classe 'User' trata tudo relaçionado ao usuário
    public $id;
    public $user_from;
    public $user_to;
}

interface UserRelationDAO {
    public function insert(UserRelation $u);
    public function getRelationsfrom($id) ;     // método 'getRelations' pega as relações do usuário
}