<?php
interface APIDesenho {
    public function desenharCirculo($x, $y, $radius);        // função que desenha um círculo    
}

class APIDesenho1 implements APIDesenho {
    public function desenharCirculo($x, $y, $radius) {
        echo "Desenhando Círculo versão 1: ", $x, $y. " - ". $radius;
    }
}

class APIDesenho2 implements APIDesenho {
    public function desenharCirculo($x, $y, $radius) {
        echo "Desenhando Círculo versão 2: ", $x, $y. " - ". $radius;
    }
}

abstract class Forma {      // classe do tipo 'abstrata'
    protected $api;
    protected $x;        // propriedade para coordenada x
    protected $y;    // propriedade para coordenada y

    public function __construct(APIDesenho $api) {
        $this->api = $api;       // injeção de dependência da API de desenho
    }
}

class Circulo extends Forma {       // classe 'principal' Circulo 
    protected $radius; // Propriedade específica para o raio do círculo

    public function __construct($x, $y, $radius, APIDesenho $api) {
        parent::__construct($api);       // 'parent' acessa o contrutor que tem a 'api' que vai ser ultilizada nos desenhos
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function desenhar() {
        $this->api->desenharCirculo($this->x, $this->y, $this->radius);
    }
}

$circulo = new Circulo(1, 3, 7, new APIDesenho1());
$circulo->desenhar();
