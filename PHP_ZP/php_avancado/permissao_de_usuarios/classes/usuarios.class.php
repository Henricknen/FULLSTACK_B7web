<?php       // arquivo com classe 'Usuarios' que cuidará dos usuários

class Usuarios {

    private $pdo;
    private $id;
    private $permissoes;

    public function __construct($pdo) {     // fazendo conexão com banco de dados atraves do 'construtor'
        $this-> pdo = $pdo;
    }

    public function fazerLogin($email, $senha) {        // método 'fazerLogin' fará o login
        $sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $sql = $this-> pdo-> prepare($sql);
        $sql-> bindValue(":email", $email);
        $sql-> bindValue(":senha", $senha);
        $sql-> execute();

        if ($sql-> rowCount() > 0) {
            $usuario = $sql-> fetch();      // pega as informações do usuário

            $_SESSION['logado'] = $usuario['id'];

            return true;
        }

        return false;
    }

    public function setUsuario($id) {       // classe 'setUsuario' que salvará o 'id' e as 'permissoes' do usuario
        $this-> id = $id;

        $sql = "SELECT * FROM usuarios WHERE id = :id";
        $sql = $this->pdo-> prepare($sql);
        $sql-> bindValue(":id", $id);
        $sql-> execute();

        if ($sql-> rowCount() > 0) {
            $usuario = $sql->fetch();
            $this-> permissoes = explode(',', $usuario['permissoes']);      // definindo 'set' as permissões e salvando dentro da variável 'permissoes'
        }
    }

    public function getPermissoes() {
        return $this-> permissoes;
    }
}
