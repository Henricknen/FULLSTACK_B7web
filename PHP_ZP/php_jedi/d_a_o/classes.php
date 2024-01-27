<?php 

class Database {        // classe faz conexão com banco de dados
    protected $db;          // definindo propriedade '$db' como 'protected' para que se açessa la dentro de UsuarioDAO
    public function __construct() {
        try {
            $this-> db = new PDO("mysql:dbname=jedi_dao;host=localhost", "root", "");       // 'conexão' com banco de dados
            $this-> db-> setAttribute(PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("". $e-> getMessage());
        }
    }
}

class UsuarioDAO extends Database {      // classe é responsável por fazer toda 'manipulação' de dados entre o 'banco de dados' e o 'código' do sistema
    public function __construct() {         // o construtor da classe, invoca o construtor da classe pai 'Database', estabelece a conexão com o banco de dados
        parent:: __construct();
    }

    public function get($fields = array(), $where = array()) {     // método 'get' responsável por fazer a listagem de todos os usuários ultilizando como parâmetros os campos que serão pegos
        $usuarios = array();        // local onde a lista será armazenada
        $valores = array();

        if(count($fields) == 0) {       // verificando se tem campos no array
            $fields = array('*');       
        }

        $sql = "SELECT ". implode(',', $fields). "FROM usuarios";       // se houver campos serão separados por ','

        if(count($where) > 0) {     // se tiver campos no 'where' o array será dividido em dois
            $tabelas = array_keys($where);      // chave guarda os 'nomes' das tabelas = id, name, email etc...
            $valores = array_values($where);        // guarda os 'valores'
            $comp = array();

            foreach($tabelas as $tabela) {
                $comp[] = $tabela. " = ?";
            }

            $sql .= implode(" AND ", $comp);        // inserindo no $sql
        }

        $sql = $this-> db-> prepare($sql);      // enviando para o 'prepare'
        $sql-> execute($valores);       // mandando os valores

        if($sql-> rowCount() > 0) {     // verificando se tem resultado
            foreach($sql-> fetchAll() as $item) {
                $usuarios[] = new Usuario($item);      // criando um array com vários objeto do tipo usuário
            }
        }

        return $usuarios;
    }

    // // public function insert($fields = array()) {      // método de inserção de dados reçebendo como parâmetro os campos que serão inseridos
    // //     if(count($fields) > 0) {        // proteção pois 'insert' sempre tem que enserir algum dado obrigatoriamente

    // //         $questions = array();       
    //             foreach ($fields as $field) {
    //                 $questions[] = '?';
    //             }

    // //         $sql = "INSERT INTO usuarios(". implode(',', array_keys($fields)). ")VALUES(". implode(',', $questions). ")";     // query de 'inserção' dados

    // //         $sql = $this-> db-> prepare($sql);
    // //         $sql-> execute(array_values($fields));      // executando e enviando os dados que serão inseridos
    // //     }
    // // }
    public function insert(Usuario $usuario) {
        $fields = array(
            'name'=> $usuario-> getName(),
            'email'=> $usuario-> getEmail(),
            'pass'=> $usuario-> getPass()
        );
        try {
            if (isset($fields['id']) && $fields['id'] !== null && $fields['id'] !== '') {       // verificar se o campo 'id' existe no array $fields e não está vazio ou null
                $existingRecord = $this->checkExistingRecord($fields['id']);        // verificar se já existe um registro com a mesma chave primária
    
                if (!$existingRecord) {
                    $placeholders = array_fill(0, count($fields), '?');
                    $sql = "INSERT INTO usuarios(". implode(',', array_keys($fields)). ") VALUES(". implode(',', $placeholders). ")";
                    $stmt = $this->db-> prepare($sql);
                    $stmt->execute(array_values($fields));
                    echo "Inserção realizada com sucesso.";
                } else {
                    throw new Exception("Registro com a chave primária '{$fields['id']}' já existe na tabela.");
                }
            } else {
                throw new Exception("O campo 'id' é obrigatório e não pode ser vazio ou nulo para a inserção.");
            }
        } catch (Exception $e) {
            echo "Erro: " . $e-> getMessage();
        }
    }
    
    private function checkExistingRecord($id) {
        $sql = "SELECT COUNT(*) FROM usuarios WHERE id = ?";
        $stmt = $this-> db-> prepare($sql);
        $stmt->execute([$id]);
        $count = $stmt-> fetchColumn();
    
        return $count > 0;
    }
    
}

class Usuario {
    private $name;
    private $email;
    private $pass;
    private $id;

    public function __construct($array) {       // criação do 'construtor' que recebe um array associativo com informações do usuário
        $this->name = (isset($array["name"])) ? $array["name"] : "";        // define o 'nome' do usuário, se existir no array, caso contrário, define como string vazia

        $this->email = (isset($array["email"])) ? $array["email"] : "";

        $this->pass = (isset($array["pass"])) ? $array["pass"] : '';

        $this->id = (isset($array['id'])) ? $array['id'] : '';
    }

    public function getName() { return $this-> name; }       // retorna o 'nome' do usuário

    public function getEmail() { return $this-> email; }     // retorna o 'email' do usuário

    public function getId() { return $this-> id; }       // retorna o 'ID' do usuário
    
    public function getPass() { return $this-> pass; }
}
