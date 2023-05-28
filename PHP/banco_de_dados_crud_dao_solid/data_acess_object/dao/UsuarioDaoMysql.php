<?php
require_once 'models/Usuario.php';       // 'require_once' inclui 'Usuario.php' e garante que não seja incluido novamente
class UsuarioDaoMysql implements UsuarioDAO {       // implementando 'interface UsuarioDAO'
    private $pdo;       // reçebendo '$pdo' de fora através de injeção de dependênçia
    public function __construct(PDO $driver) {
        $this-> pdo = $driver;
    }

    public function add(Usuario $u) {       // 'add' reçebe o usuário e faz a adição no banco de dados
        $sql = $this-> pdo-> prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");     // 'query' de adição
        $sql-> bindValue(':nome', $u-> getNome());
        $sql-> bindValue(':email', $u-> getEmail());
        $sql-> execute();

        $u-> setId($this-> pdo-> lastInsertId());       // adiçionado o 'id' ao usuário que for adiçionado ultilizando método 'lastInsertId' que pega o último 'id'
        return $u;
    }

    public function findAll() {
        return $array = [];
    }

    public function findByEmail($email) {      
        $sql = $this-> pdo-> prepare("SELECT * FROM usuarios WHERE email = :email");        // fazendo uma busca pelo 'email'
        $sql-> bindValue(':email', $email);
        $sql-> execute();
        if($sql-> rowCount() > 0) {     // se achar um usuário com o 'email'
            $data = $sql-> fetch();

            $u = new Usuario();     // instançia um objetor '$u'
            $u -> setId($data['id']);
            $u -> setNome($data['nome']);
            $u -> setEmail($data['email']);

            return $u;      // retornando o objeto criado
        } else {
            return false;
        }
    }

    public function findById($id) {

    }
}