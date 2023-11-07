<?php

class Contato {

    private $pdo;       // variável privada '$pdo' possibilida a conexão do banco de dados em todos locais da classe 'Contato' 
    public function __construct() {
        $this-> pdo = new PDO("mysql:dbname=crud_oo;host=localhost", "root", "");       // conexão com banco de dados 'crud_oo'
    }
            // CREATE
    public function adicionar($email, $nome = '') {     // método adiçionar 'create' com parâmetros, '$mail' de preenchimento obrigatorio e '$nome' opçional
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
    public function getInfo($id) {     // método pega informações de um contato espeçifico com base em seu 'id'
        $sql = "SELECT * FROM contatos WHERE id = :id";
        $sql = $this-> pdo-> prepare($sql);
        $sql-> bindValue(':id', $id);
        $sql-> execute();

        if($sql-> rowCount() > 0) {
            return $sql-> fetch();       // retornando todos os dados desse contato espeçifico com base no 'id'
        } else {
            return array();     // se não encontrar nenhum dado retorna um array 'vazio'
        }
    }

    public function getAll() {      // lendo a lista de 'todos' os contatos
        $sql = "SELECT * FROM contatos";
        $sql = $this-> pdo-> query($sql);

        if($sql-> rowCount() > 0) {
            return $sql-> fetchAll();       // retornando todos os contatos
        } else {
            return array();     // se não encontrar nenhum cotato retorna um array 'vazio'
        }
    }
            // UPDATE
    public function editar($nome, $email, $id) {
        if($this-> existeEmail($email) == false) {      // se não exisitir o email no banco de dados pode fazer a alteração
            $sql =  "UPDATE contatos SET nome = :nome, email = :email WHERE id = :id";        // atualização no banco de dados
            $sql = $this-> pdo-> prepare($sql);
            $sql-> bindValue(':nome', $nome);
            $sql-> bindValue(':email', $email);
            $sql-> bindValue(':id', $id);
            $sql-> execute();

            return true;
        } else {
            return false;
        }
    }
            // DELETE
    public function excluir($id) {       // criando método para deletar 'delete' um contato via 'id'
        $sql = "DELETE FROM contatos WHERE id = :id";     // deletando contato onde a coluna 'id' for igual ao valor fornecido para o marcador ':id'
            $sql = $this-> pdo-> prepare($sql);
            $sql-> bindValue(':id', $id);
            $sql-> execute();

    }

    private function existeEmail($email) {      // método verifica se o 'email' existe no sistema
        $sql = "SELECT * FROM contatos WHERE email = :email";
        $sql = $this-> pdo -> prepare($sql);
        $sql-> bindValue(':email', $email);
        $sql-> execute();

        if($sql-> rowCount() > 0) {     // verifica se se está 'query' teve algum retorno
            return true;        // se teve significa que existe um 'email'
        } else {
            return false;
        }
    }

}

?>