<?php       // arquivo com classe que cuidará dos usuários

class Usuarios {

    private $pdo;
    private $id;
    private $permissoes;

    public function __construct($pdo) {     // fazendo conexão com banco de dados atraves do 'construtor'
        $this->pdo = $pdo;
    }

    public function fazerLogin($email, $senha) {        // fazendo 'login'
        $sql = "SELECT * FROM usuarios WHERE email = :email";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $usuario = $sql->fetch();      // pega as informações dousuário

            // Verifica a senha usando password_verify
            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['logado'] = $usuario['id'];
                return true;
            }
        }

        return false;
    }

    public function setUsuario($id) {
        $this->id = $id;

        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":id", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $usuario = $sql->fetch();
            $this->permissoes = explode(',', $usuario['permissoes']);
        }
    }

    public function getPermissoes() {
        return $this->permissoes;
    }
}
