<?php
class Usuario {     // classe tem mesma estrutura de dados da tabela 'usuarios' criada no banco de dados
    private $id;
    private $nome;
    private $email;

    public function getId() {
        return $this-> id;
    }

    public function setId($i) {         // método 'setId' reçebe um parâmetro '$i'
        $this-> id = trim($i);      // parâmetro '$i' é inserido em 'id' e 'trim' tira eventuais 'espaços' que podem apareçer
    }

    public function getNome() {
        return $this-> nome;
    }

    public function setNome($n) {
        $this-> nome = ucwords(trim($n));     // 'ucwords' transforma a primeira letra dos nomes em maiúscula
    }

    public function getEmail() {
        return $this-> email;
    }

    public function setEmail($e) {
        $this-> email = strtolower(trim($e));      // 'strtolower' passa o email para letras minúculas
    }
}

interface UsuarioDAO {      // classe que irá manipular o banco de dados
    public function add(Usuario $u);    // 'add' reçebe um objeto da classe 'usuario', [CREATE]
    public function findAll();      // 'findAll' retorna uma lista com varios objetos da classe 'Usuario', [READ]
    public function findByEmail($email);
    public function findById($id);         // encontra um usúario através do 'id', [READ]
    public function update(Usuario $u);     // 'update' reçebe um objeto de 'Usuario' com os dados atualizados, [UPDATE]
    public function delete($id);        // 'delete' reçebe o 'id', [DELETE]
}