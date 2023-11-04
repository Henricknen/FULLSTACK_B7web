<?php

class Contato {

    private $pdo;       // variável privada '$pdo' possibilida a conexão do banco de dados em todos locais da classe 'Contato' 
    public function __construct() {
        $this-> pdo = new PDO("mysql:dbname=crud_oo;host=localhost", "root", "");       // conexão com banco de dados 'crud_oo'
    }
}

?>