<?php
interface Forma {
    public function getTipo();
    public function getArea();
}

class Quadrado implements Forma {        // classe 'Quadrado' implementando interfaçe 'Forma' obrigando está classe ter 'getTipo' e 'getArea'
    private $largura;
    private $altura;

    public function __construct($l, $a) {       // construtor reçebendo '$l' e '$a' como parâmetros
        $this-> largura = $l;       // propriedade 'largura' reçebendo o valor do parâmetro '$l' 
        $this-> altura = $a;    // propriedade 'altura' reçebendo o valor do parâmetro '$a'
    }

    public function getTipo() {     // método  é obrigatório
        return 'quadrado';
    }

    public function getArea() {     // método  é obrigatório
        return $this-> largura * $this-> altura;        // calculo da 'area'
    }
}

class Circulo implements Forma {     // classe 'Circulo' implementando interfaçe 'Forma' obrigando está classe ter 'getTipo' e 'getArea'
    private $raio;

    public function __construct($r) {
        $this-> raio = $r;
    }

    public function getTipo() {
        return 'circulo';
    }

    public function getArea() {
        return pi() * ($this-> raio * $this-> raio);        // ultilizando função 'pi' e 'raio' ao quadrado para chegar a 'area' do circulo
    }
}

$quadrado = new Quadrado(5, 5);     // criação do objeto 'quadrado'
$circulo = new Circulo(7);      // criação do objeto 'circulo'

$objetos = [        // array 'objetos'
    $quadrado,
    $circulo
];

foreach($objetos as $objeto) {      // ultilizando 'foreach' para percorrer cada elemento do array 'objetos'
    $tipo = $objeto-> getTipo();        // rodadando método 'getTipo'
    $area = $objeto-> getArea();    // rodadando método 'getArea'

    echo "Area ". $tipo. " : ". $area. "<br>";
}