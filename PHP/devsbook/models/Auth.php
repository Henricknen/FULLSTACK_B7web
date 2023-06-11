<?php
require 'dao/UserDaoMysql.php';

class Auth {
    private $pdo;
    private $base;

    public function __construct(PDO $pdo, $base) {     // contrutor salvará os dados de '$pdo' e '$base'
        $this-> pdo = $pdo;
        $this-> base = $base;        
    }

    public function checkToken() {       // método 'checkToken' retorna o usuário que está logado ou redireçiona automaticamente para página de 'login'
        if (!empty($_SESSION['token'])) {    // verificando se seção 'token' existe e se está preenchida
            $token = $_SESSION['token'];        // armazenando token na variável '$token'
            
            $userDao = new UserDaoMysql($this-> pdo);        // instançiando 'UserDao'
            $user = $userDao-> findByToken($token);     // verificando o usuário pelo 'token'

            if($user) {
                return $user;       // se encontrado 'token' do usuário retorna o próprio usuário
            }
            
        }

        header("Location: ". $this-> base. "/login.php");
        exit;

    }

        public function validateLogin($email, $password) {
            $userDao = new UserDaoMysql($this-> pdo);

            $user = $userDao-> findByEmail($email);     // verificando se 'email' existe
            if($user) {     // se 'email' existir será verificado 'password'

                if(password_verify($password, $user-> password)) {      // verificando se 'password' que usuário mandou está batendo com o 'password' que está no banco de dados
                    $token = md5(time(). rand(0, 9999));     // gerando o 'token'

                    $_SESSION['token']= $token;     // salvando o 'token' na seção
                    $user-> token = $token;
                    $userDao-> update($user);       // salvando o 'token' no banco de dados

                    return true;
                }
            }

            return false;
        }
    
}