<?php
require_once 'models/User.php';

class UserDaoMysql implements UserDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this-> pdo = $driver;
    }

    private function generateUser($array) {       // função reçebe um 'array' e monta um 'objeto'
        $u = new User() ;
        $u-> id = $array['id'] ?? 0;
        $u-> email = $array['email'] ?? '';
        $u-> name = $array['name'] ?? '';
        $u-> birthdate = $array['birthdate'] ?? '';
        $u-> city = $array['city'] ?? '';
        $u-> work = $array['work'] ?? '';
        $u-> avatar = $array['avatar'] ?? '';
        $u-> cover = $array['cover'] ?? '';
        $u-> token = $array['token'] ?? '';

        return $u;

    }

    public function findByToken($token) {
        if(!empty($token))         {
            $sql = $this-> pdo-> prepare("SELECT * FROM users WHERE token = :token");       // fazendo consulta do 'token' na tabela 'users'
            $sql-> bindValue(":token", $token);
            $sql-> execute();

            if($sql-> rowCount() > 0) {      // verificando se encontrou alguma coisa
                $data = $sql-> fetch(PDO:: FETCH_ASSOC);
                $user = $this-> generateUser($data);
                return $user;       // se o usuário for encontrado seá retornado o próprio usuário
            }

        }

        return false;
    }
}