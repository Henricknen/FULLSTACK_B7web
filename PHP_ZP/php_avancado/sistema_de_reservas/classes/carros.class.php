<?php

class Carros {

    private $pdo;

    public function __construct($pdo) {     // construtor reçebe a conexão 'pdo'
        $this-> pdo = $pdo;
    }

    public function getCarros() {       // método 'getCarros' lista os carros
        $array = array();

        $sql = "SELECT * FROM carros";
        $sql = $this-> pdo-> query($sql);

        if($sql-> rowCount() > 0) {
            $array = $sql-> fetchAll();
        }

        return $array;      // retornando a 'lista' de carros

    }

}