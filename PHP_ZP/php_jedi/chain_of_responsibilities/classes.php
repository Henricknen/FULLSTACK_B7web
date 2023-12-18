<?php

class Carga {       // criando classe 'Carga' que é basicamente um objeto
    private $peso;

    public function __construct($p) {       // construtor reçebendo '$p' que é o peso
        $this-> peso = $p;
    }

    public function getPeso() {
        return $this-> peso;
    }
}

class Moto {
    private $sucessor;

    public function setSucessor($s) {       // método 'setSucessor' reçebendo im objeto como parâmetro
        $this-> sucessor = $s;
    }

    public function transport(Carga $carga) {       // função que 'transportará' a carga reçebendo a própria carga como parâmetro
        if($carga-> getPeso() <= 500) {     // verificando se 'moto' pode transporta a carga
            echo "Levou de Moto!";
        } else {
            $this-> sucessor-> transport($carga);       // se não passa a carga para o 'sucessor'
        }
    }
}

class Carro {
    private $sucessor;

    public function setSucessor($s) {
        $this-> sucessor = $s;
    }

    public function transport(Carga $carga) {
        if($carga-> getPeso() <= 5000) {        // limite de peso do carro
            echo "Levou de Carro!";
        } else {
            $this-> sucessor-> transport($carga);
        }
    }
}

class Caminhao {
    private $sucessor;

    public function Sucessor($s) {
        $this-> sucessor = $s;
    }

    public function transport(Carga $carga) {
        if($carga-> getPeso() <= 30000) {       // limite de peso do caminhão
            echo "Levou de Caminhão!";
        } else {
            echo "Não foi possível levar está carga!";          // messagem de aviso pois 'Caminhão' não tem sucessor
            $this-> sucessor-> transport($carga);
        }
    }
}