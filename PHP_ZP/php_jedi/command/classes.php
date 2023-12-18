<?php
class Luz {
    private $status;

    public function ligar() {       // método transforma o 'status' em on
        $this-> status = 'on';
    }    

    public function desligar() {        // transforma 'status' em off
        $this-> status = 'off';
    }

    public function getStatus() {       // pega os dados 'atuais' da Luz
        return $this-> status;
    }
}

class LuzOnCommand {        // classe representa um comando para 'ligar' a luz
    private $luz;       // reçebendo o objeto de 'luz'
    public function __construct(Luz $luz) {     // injeção de dependênçia
        $this-> luz = $luz;
    }
    public function execute() {
        $this-> luz-> ligar();
    }
}

class LuzOffCommand {
    private $luz;
    public function __construct(Luz $luz) {
        $this-> luz = $luz;
    }
    public function execute() {
        $this-> luz-> desligar();
    }
}

function CallCommand($c) {      // função reçebe uma classe como parâmetro
    $c-> execute();     // dando um execute na classe reçebida
}