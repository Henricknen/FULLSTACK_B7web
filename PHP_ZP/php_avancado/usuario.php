<?php

class Usuario {

    private $id;        // propriedades definidas como 'private' iguais ao do banco de dados
    private $nome;
    private $email;
    private $senha;

    public function __construct($i) {
        if (!empty($i)) {        // verifica se o parâmetro $i não está vazio
            try {
                $this->pdo = new PDO("mysql:dbname=usuarios;host=localhost", "root", "");        // conexão com o banco de dados
            } catch (PDOException $e) {
                echo "Falhou...: " . $e->getMessage();       // mensagem se houver falha na conexão
            }
    
            $sql = "SELECT * FROM usuarioss WHERE id = ?";       // selecionando dados do usuário com o 'id' fornecido
            $sql = $this->pdo->prepare($sql);        // prepara a consulta SQL
            $sql->execute(array($i));        // executa a consulta
    
            if ($sql->rowCount() > 0) {      // verifica se achou algum resultado
                $data = $sql->fetch();           // obtém os dados do usuário
                $this->id = $data['id'];             // atribui o valor do campo 'id' ao atributo 'id' da classe
                $this->nome = $data['nome'];             // atribui o valor do campo 'nome' ao atributo 'nome' da classe
                $this->email = $data['email'];  // atribui o valor do campo 'email' ao atributo 'email' da classe
                $this->senha = $data['senha'];       // atribui o valor do campo 'senha' ao atributo 'senha' da classe
            }
        }
    }
    

    public function getId() {       // método 'getId' pega o 'id'
        return $this-> id;
    }

    public function setEmail($e) {      // método 'setEmail' ultilizado para alterar o email do usuário
        $this-> email = $e;
    }

    public function getEmail() {
        return $this-> email;
    }


    public function setSenha($s) {
        $this-> senha = s;
    }

    public function setNome($n) {
        $this-> nome = $n;
    }

    public function getNome() {
        return $this-> nome;
    }

}

?>