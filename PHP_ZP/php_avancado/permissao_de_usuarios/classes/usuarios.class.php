<?php       // arquivo com classe que cuidará dos usuários

class usuarios {

    private $pdo;
    private $id;

    public function __construct($pdo) {     // fazendo conexão com banco de dados atraves do 'construtor'
        
        $this-> pdo = $pdo;
    }

    public function fazerlogin($email, $senha) {        // fazendo 'login'

        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $this-> pdo-> prepare($sql);
        $sql-> bindValue(":email", $email);
        $sql-> bindValue(":senha", $senha);
        $sql-> execute();

        if($sql-> rowCount() > 0) {
            $sql = $sql-> fetch();

            $_SESSION['logado'] = $sql['id'];

            return true;
        }

        return false;
    }

    public function setUsuario() {
        $this-> id = $id;

        $sql = "SELECT * FROM usuarios WHERE :id = :id";
        $sql = $this-> pdo-> prepare($sql);
        $sql-> bindValue("id", $id);
        $sql-> execute();
        
        if($sql-> roeCount() > 0) {
            $sql = $sql-> fetch();

            $this-> permissoes = explode(',', $sql['permissoes']);
        }

    }
}