<?php

class Contato {

    private $pdo;       // variável privada '$pdo' possibilida a conexão do banco de dados em todos locais da classe 'Contato' 
    public function __construct() {
        $this-> pdo = new PDO("mysql:dbname=crud_oo;host=localhost", "root", "");       // conexão com banco de dados 'crud_oo'
    }
            // CREATE
    public function adicionar($email, $nome = '') {     // método 'adiçionar' com parâmetros, '$mail' de preenchimento obrigatorio e '$nome' opçional
        if($this-> existeEmail($email) == false) {          // se o 'email' não existir no sistema
            $sql = "INSERT INTO contatos (nome, email) VALUES (:nome, :email)";     // ocorre a inserção na tabela 'contatos' do banco de dados
            $sql = $this-> pdo-> prepare($sql);     // acessando o pdo 'conexão' 
            $sql-> bindValue(':nome', $nome);
            $sql-> bindValue(':email', $email);
            $sql-> execute();

            return true;
        } else {
            return false;       // se já existir 'email' no sistema
        }
    }
            // READ
    public function getNome($email) {       // lendo as informações de um 'contato espeçifico' através do seu 'email'
        $sql = "SELECT nome FROM contatos WHERE email = :email";
        $sql = $this-> pdo-> prepare($sql);
        $sql-> bindValue(':email', $email);
        $sql-> execute();

        if($sql-> rowCount() > 0) {     // verificando se foi encontrado um contato com 'email' requirido
            $info = $sql-> fetch();

            return $info['nome'];       // retornando o nome do contato
        } else {
            return '';
        }
    }

    public function getAll() {      // lendo a lista de 'todos' os contatos
        $sql = "SLECT * FROM contatos";
        $sql = $this-> pdo-> query($sql);

        if($sql-> rowCount() > 0) {
            return $sql-> fetchAll();       // retornando todos os contatos
        } else {
            return array();     // se não encontrar nenhum cotato retorna um array 'vazio'
        }
    }

    private function existeEmail($email) {      // método verifica se o 'email' existe no sistema

    }
}

?>