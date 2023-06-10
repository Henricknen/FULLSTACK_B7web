<?php
class Auth {
    private $pdo;
    private $base;

    public function __construct(PDO $pdo, $base) {     // contrutor salvará os dados de '$pdo' e '$base'
        $this-> pdo = $pdo;
        $this-> base = $base;        
    }

    public static function checkToken() {       // função 'checkToken' retorna o usuário que está logado ou redireçiona automaticamente para página de 'login'
        if(!empty($_SESSION['token'])) {    // verificando se seção 'token' existe e se está preenchida
            $token = $_SESSION['token'];        // armazenando token na variável '$token'


        }

        header("Location: /login.php");
        exit;
    }
}