<?php
require_once 'models/Usuario.php';

class UsuarioDaoMysql implements UsuarioDAO {
    private $pdo;

    public function __construct(PDO $driver) {
        $this->pdo = $driver;
    }

    public function add(Usuario $u) {
        $sql = $this->pdo->prepare("INSERT INTO usuarios (nome, email) VALUES (:nome, :email)");
        $sql->bindValue(':nome', $u->getNome());
        $sql->bindValue(':email', $u->getEmail());
        $sql->execute();

        $u->setId($this->pdo->lastInsertId());
        return $u;
    }

    public function findAll() {
        $array = [];

        $sql = $this->pdo->query("SELECT * FROM usuarios");
        if ($sql->rowCount() > 0) {
            $data = $sql->fetchAll();

            foreach ($data as $item) {
                $u = new Usuario();
                $u->setId($item['id']);
                $u->setNome($item['nome']);
                $u->setEmail($item['email']);

                $array[] = $u;
            }
        }

        return $array;
    }

    public function findByEmail($email) {
        $sql = $this->pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        if($sql-> rowCount() > 0) {     // se achar um usuário com o 'email'
            $data = $sql-> fetch();

            $u = new Usuario();     // instançia um objeto '$u'
            $u -> setId($data['id']);
            $u -> setNome($data['nome']);
            $u -> setEmail($data['email']);
Expand All
	@@ -57,11 +57,31 @@ public function findByEmail($email) {
    }

    public function findById($id) {
        $sql = $this-> pdo-> prepare("SELECT * FROM usuarios WHERE id = :id");        // fazendo uma busca pelo 'id'
        $sql-> bindValue(':id', $id);
        $sql-> execute();
        if($sql-> rowCount() > 0) {     // se achar um usuário com o 'id'
            $data = $sql-> fetch();

            $u = new Usuario();     // instançia um objeto '$u'
            $u -> setId($data['id']);
            $u -> setNome($data['nome']);
            $u -> setEmail($data['email']);

            return $u;      // retornando o objeto criado
        } else {
            return false;
        }
    }

    public function update(Usuario $u) {
        $sql = $this-> pdo-> prepare("UPDATE usuarios SET nome = :nome, email = :email WHERE id = :id");     // query de atualização
        $sql-> bindValue('nome', $u-> getNome());     // preenchendo os dados
        $sql-> bindValue('email', $u-> getEmail());
        $sql-> bindValue('id', $u-> getId());
        $sql-> execute();

        return true;
    }

    public function delete($id) {}
