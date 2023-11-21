<?php

class Reservas {

    private $pdo;

    public function __construct($pdo) {     // construtor reçebe a conexão 'pdo'
        $this-> pdo = $pdo;
    }

    public function getReservas() {     // método 'getReservas' vai lista as reservas 'salvas' no banco de dados
        $array = array();

        $sql = "SELECT * FROM reservas";        // 'listando' as reservas
        $sql = $this-> pdo-> query($sql);

        if($sql-> rowCount() > 0) {
            $array = $sql-> fetchAll();     // pegando todos resultados encontrados e armazenando na variável '$array'
        }

        return $array;
    }

}