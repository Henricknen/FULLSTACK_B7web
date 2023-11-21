<?php

class Carros {

    private $pdo;

    public function __construct($pdo) {     // construtor reçebe a conexão 'pdo'
        $this-> pdo = $pdo;
    }

}