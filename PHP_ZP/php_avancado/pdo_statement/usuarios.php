<?php

class Usuarios {        // classe responsável pela manipulação da tabela 'Usuarios'
    private $db;

    public function __construct() {      // 'construtor' estabelece uma conexão com o banco de dados 'blog'
        try {
            $this->db = new PDO("mysql:dbname=blog;host=localhost", "root", "");
        } catch (PDOException $e) {
            echo "FALHA: " . $e->getMessage();
        }
    }

    public function selecionar($id) {       // função para selecionar um usuário com base no 'id' fornecido como parâmetro
        $sql = $this->db->prepare("SELECT * FROM usuarios WHERE id = :id"); // Preparando a consulta SQL
        $sql->bindValue("id", $id);
        $sql->execute();         // executando a consulta SQL

        $array = array();        // criando um array vazio
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();      // se a consulta retornar resultados, preenche o array
        }

        return $array;
    }

    public function inserir($email, $senha) {        // função para inserir um novo usuário
        $sql = $this->db->prepare("INSERT INTO usuarios SET email = :email, senha = :senha");
        $sql->bindParam(":email", $email);
        $sql->bindValue(":senha", md5($senha));
        $sql->execute();
    }

    public function atualizar($email, $senha, $id) {         // função para atualizar os dados de um usuário
        $sql = $this->db->prepare("UPDATE usuarios SET email = ?, senha = ? WHERE id = ?");
        $sql->execute(array($email, md5($senha), $id));
    }

    public function excluir($id) {      // função para excluir um usuário
        $sql = $this->db->prepare("DELETE FROM usuarios WHERE id = ?");
        $sql->bindValue(1, $id);
        $sql->execute();
    }
}

?>
