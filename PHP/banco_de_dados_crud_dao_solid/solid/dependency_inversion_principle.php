<?php
interface DBConnection {     // interface que representa uma conexão com o banco de dados
    public function connect();    // método responsável por fazer a conexão
}

class MySQLConnection implements DBConnection {      // classe que implementa a interface DBConnection e faz conexão com banco 'MySQL'
    public function connect() {}
}

class OracleConnection implements DBConnection {         // classe que implementa a interface DBConnection e faz conexão com banco 'Oracle'
    public function connect() {}
}

class MongoConnection implements DBConnection {         // classe que implementa a interface DBConnection e faz conexão com banco 'Mongo'
    public function connect() {}
}

class UsuarioDAO {      // classe que representa um DAO para a entidade Usuário
    private $db;    // Objeto que representa a 'conexão' com o banco de dados

    public function __construct(DBConnection $dbCon) {       // construtor que recebe interfaçe 'DBConnection' que todas as dependnçias implementa
        $this->db = $dbCon;
    }
}

$dbCon = new OracleConnection();     // Instanciando uma conexão com o banco de dados Oracle
// $dbCon = new MySQLConnection();
// $dbCon = new MongoConnection();

$usuarioDAO = new UsuarioDAO($dbCon);        // Instanciando um objeto 'UsuarioDAO' passando a conexão com o parâmetro '$dbCon'
$usuario2DAO = new UsuarioDAO($dbCon);          // Instanciando outro objeto 'UsuarioDAO' com a mesma conexão