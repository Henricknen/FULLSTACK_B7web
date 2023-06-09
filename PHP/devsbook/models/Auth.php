<?php
require 'dao/UserDaoMysql.php';

class Auth {
    private $pdo;
    private $base;
    private $dao;

    public function __construct(PDO $pdo, $base) {     // contrutor salvará os dados de '$pdo' e '$base'
        $this-> pdo = $pdo;
        $this-> base = $base;        
        $this-> dao = new UserDaoMysql($this-> pdo);

    }

    public function checkToken() {       // método 'checkToken' retorna o usuário que está logado ou redireçiona automaticamente para página de 'login'
        if (!empty($_SESSION['token'])) {    // verificando se seção 'token' existe e se está preenchida
            $token = $_SESSION['token'];        // armazenando token na variável '$token'
            
            $user = $this-> dao-> findByToken($token);     // verificando o usuário pelo 'token'

            if($user) {
                return $user;       // se encontrado 'token' do usuário retorna o próprio usuário
            }
            
        }

        header("Location: ". $this-> base. "/login.php");
        exit;

    }

        public function validateLogin($email, $password) {      // reçebendo '$email' e '$password'

            $user = $this-> dao-> findByEmail($email);     // verificando se 'email' existe
            if($user) {     // se 'email' existir será verificado 'password'
                
                if(password_verify($password, $user-> password)) {      // verificando se 'password' que usuário mandou está batendo com o 'password' que está no banco de dados
                    $token = md5(time(). rand(0, 9999));     // gerando o 'token'

                    $_SESSION['token']= $token;     // salvando o 'token' na seção
                    $user-> token = $token;
                    $this-> dao-> update($user);       // salvando o 'token' no banco de dados

                    return true;
                }
            }

            return false;
        }

    public function emailExists($email) {     // função verifica se 'email' existe no banco de dados
        return $this-> dao-> findByEmail($email) ? true : false;       // ultilizando operador ternariona verificação
    }

    public function registerUser($name, $email, $password, $birthdate) {

        $hash = password_hash($password, PASSWORD_DEFAULT);     // gerando um 'hash' ultilizando o 'password' que usuário mandar
        $token = md5(time(). rand(0, 9999));     // gerando o 'token'

        $newUser = new User();      // criando um usuário
        $newUser-> name = $name;        // preenchendo os dados do usuário com dados mandados pelo usuário
        $newUser-> email = $email;
        $newUser-> password = $hash;
        $newUser-> birthdate = $birthdate;
        $newUser-> token = $token;

        $this-> dao-> insert($newUser);        // dando um 'insert' e mandando um objeto  da classe 'User' que está sendo atribuido  à variável '$newUser'

        $_SESSION['token'] = $token;
    }
}