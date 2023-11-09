<?php

class Usuarios {
    private $db;

    public function __construct() {
        try {
            $this-> db = new PDO("mysql:dbname=blog;host=localhost", "root", "");       // conexão com banco de dados 'blog'
        } catch(PDOException $e) {
            echo "FALHA: ". $e-> getMessage();
        }
    }
}

?>