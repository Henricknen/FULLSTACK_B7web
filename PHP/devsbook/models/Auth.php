<?php
class Auth {
    private $pdo;
    private $base;

    public function __construct(PDO $pdo, $base) {     // contrutor salvará os dados de '$pdo' e '$base'
        $this-> pdo = $pdo;
        $this-> base = $base;        
    }

    public function checkToken() {       // função 'checkToken' retorna o usuário que está logado ou redireçiona automaticamente para página de 'login'
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
}