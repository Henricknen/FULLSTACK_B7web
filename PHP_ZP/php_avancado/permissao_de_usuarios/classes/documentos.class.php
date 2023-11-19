<?php

class Documentos {
    private $pdo;
    public function __construct($pdo) {
        $this-> pdo = $pdo;
    }

    public function getDocumentos() {       // método 'getDocumentos' listara os documentos
        $array = array();

        $sql = "SELECT * FROM documentos";      // seleçionando todos os documentos
        $sql = $htis-> pdo- query($sql);

        if($sql-> rowCount() > 0) {
            $array = $sql-> fetchAll();     // inserindo documentos achados dentro do '$array'
        }

        return $array;
    }
}