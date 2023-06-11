<?php
class User {        // classe 'User' trata tudo relaçionado ao usuário
    public $id;
    public $email;
    public $password;
    public $name;
    public $birthdate;
    public $city;
    public $work;
    public $avatar;
    public $cover;
    public $token;
}

interface UserDAO {
    public function findByToken($token);        // encontrando o usuário pelo 'token'
    public function findByEmail($email);
    public function update(User $u);
}