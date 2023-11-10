<?php

class Usuario {

    private $id;        // propriedades definidas como 'private' iguais ao do banco de dados
    private $nome;
    private $email;
    private $senha;

    private $pdo;

    public function __construct($i) {
        if (!empty($i)) {        // se o parâmetro '$i' não estiver vazio
            try {
                $this-> pdo = new PDO("mysql:dbname=usuarioss;host=localhost", "root", "");        // conexão com o banco de dados
            } catch (PDOException $e) {
                echo "Falhou...: " . $e->getMessage();       // mensagem se houver falha na conexão
            }
    
            $sql = "SELECT * FROM usuarioss WHERE id = ?";       // selecionando dados do usuário com o 'id' fornecido
            $sql = $this->pdo->prepare($sql);        // 'prepare' prepara a consulta 'sql'
            $sql->execute(array($i));        // executa a consulta
    
            if ($sql->rowCount() > 0) {      // verifica se existe algum valor
                $data = $sql->fetch();           // método 'fetch' obtém os dados do usuário
                $this-> id = $data['id'];             // atribui o valor do campo 'id' ao atributo 'id' da classe
                $this-> nome = $data['nome'];             // atribui o valor do campo 'nome' ao atributo 'nome' da classe
                $this-> email = $data['email'];  // atribui o valor do campo 'email' ao atributo 'email' da classe
                $this-> senha = $data['senha'];       // atribui o valor do campo 'senha' ao atributo 'senha' da classe
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
        $this-> senha = md5($s);
    }

    public function setNome($n) {
        $this-> nome = $n;
    }

    public function getNome() {
        return $this-> nome;
    }

    public function salvar() {      // método 'salvar'
        if(!empty($this-> id)) {        // se foi encontrado um 'id'
            $sql = "UPDATE usuarios SET email = '?', senha = '?', nome = '?' WHERE id = '?'";       // query de 'atualização'
            $sql = $this-> pdo-> prepare($sql);
            $sql-> execute(array($this-> email, $this-> senha, $this-> nome, $this-> id));      // mandando as informações do contato
        } else {
            
            $sql = "INSERT INTO usuarios SET email = '?', senha = '?', nome = '?'";
            $sql = $this-> pdo-> prepare($sql);
            $sql-> execute(array($this-> email, $this-> senha, $this-> nome));
        }
    }

}

?>