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

    public function verificarDidponibilidade($carro, $data_inicio, $data_fim) {

        $sql = "SELECT * FROM reservas WHERE id_carro = :carro AND
        (NOT (Data_inicio > :data_fim OR data_fim < :data_inicio))";      // verificando se ha reservas do carro, 'AND' é o perído 
        // data_inicio 
        $sql = $this-> pdo-> prepare($sql);
        $sql-> bindValue(":carro", $carro);
        $sql-> bindValue(":data_inicio", $data_inicio);
        $sql-> bindValue(":data_fim", $data_fim);
        $sql-> execute();

        if($sql-> rowCount() > 0) {         // se 'rowCount' for maior que 0 é sinal que a consulta teve resultado
            return false;       // não poderá ser feito a reserva
        } else {        // caso contrario
            return true;        // poderá ser feita a reserva
        }

    }
    public function reservar($carro, $data_inicio, $data_fim, $pessoa) {
        $sql = "INSERT INTO reservas (id_carro, data_inicio, data_fim, pessoa) VALUES (:carro, :data_inicio, :data_fim, :pessoa)";
        $sql = $this->pdo->prepare($sql);
        $sql->bindValue(":carro", $carro);
        $sql->bindValue(":data_inicio", $data_inicio);
        $sql->bindValue(":data_fim", $data_fim);
        $sql->bindValue(":pessoa", $pessoa);
        $sql->execute();
    }
}