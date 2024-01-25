<?php 
class ProfissionalObserver {     // classe 'Observadora' que será notificado caso ocorra alguma alteração no objeto 'Usuario'
    public function update(Usuario $subject) {      //classe update reçebe como parâmetro '$subject' assunto que esta observando
        echo date('H:i'). " ALERTA - PROFISSIONAL ALTERADO PARA: ". $subject-> getName();      // ações que forem neçessarias ser feitas
        echo "<hr>";
    }
}

class Usuario {
    private $name;
    private $observers = array();       // declaração da propriedade 'observers' como um array que adiçionara os observadores assoçiados a classe

    public function __construct($name) {        // construtor reçebe um $name
        $this-> name = $name;
    }

    public function attach(ProfissionalObserver $obs) {      // método attach 'adiçiona' um observervador '$obs' a classe
        $this-> observers[] = $obs;
    }

    public function detach(ProfissionalObserver $obs) {      // método detach 'remove' o observador '$obs'
        foreach($this-> observers as $key=> $o) {
            if($o == $obs) {
                unset($this-> observers[$key]);
            }
        }
    }

    public function notify() {      // método notifica o observer de 'alguma mudaça'
        foreach($this-> observers as $o) {
            $o-> update($this);
        }
    }

    public function getName() {
        return $this-> name;        
    }

    public function setName($n) {
        $this-> name = $n;

        $this-> notify();
    }
}