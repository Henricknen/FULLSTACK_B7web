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

    public function verificarDisponibilidade($carro, $data_inicio, $data_fim) {

        $sql = "SELECT * FROM reservas WHERE id_carro = :carro AND()";      // verificando se ha reservas do carro
        data_inicio 
        $sql = $this-> pdo-> prepare();
        $sql-> bindeValue(":carro", $carro);
        $sql-> bindeValue(":data_inicio", $data_inicio);
        $sql-> bindeValue(":data_fim", $data_fim);
        $sql-> execute();

        if($sql-> rowCount() > 0) {         // se 'rowCount' for maior que 0 é sinal que a consulta teve resultado
            return false;
        } else {        // caso contrario
            return true;        // poderá ser feita a reserva
        }

    }

}