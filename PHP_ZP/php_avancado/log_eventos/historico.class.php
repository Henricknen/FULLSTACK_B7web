<?php

class Historico {

    private $pdo;

    public function __construct() {

        $this->pdo = new PDO("mysql:dbname=projeto_logeventos;host=localhost", "root", "");        // conexão com o banco de dados
    }

    public function registrar($acao) {

        $ip = $_SERVER['REMOTE_ADDR'];        // obtendo o endereço 'ip' do usuário que está realizando a ação
        $sql = "INSERT INTO historico SET ip = :ip, data_acao = NOW(), acao = :acao";        // inserindo um novo registro no 'histórico'
        $sql = $this->pdo->prepare($sql);        // Preparando a consulta para execução

        $sql->bindValue(":ip", $ip);        // atribuindo os valores aos parâmetros da consulta
        $sql->bindValue(":acao", $acao);

        $sql->execute();        // Executando a consulta SQL
    }
}
