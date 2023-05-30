<?php
interface Aves {        // interface Aves com métodos para implemeentar em vários tipo de aves diferentes
    public function setLocation($lat, $lng);        // método 'setLocation' da a localização da ave
    public function render();       // 'render' é um método para fazer a 'renderização' do jogo
}
interface AvesQueVoam extends Aves {            // interfaçe 'AvesQueVoam' extends' herda todos métodos da interfaçe "Aves'
    public function setAltitude($alt);      // método 'setAltitude' define a altitude que a ave está
}

class Papagaio implements AvesQueVoam {     // classe 'Papagaio' está implementando interfaçe 'AvesQueVoam'que tem seu método espeçifico e herda métodos da interfaçe 'Aves'
    public function setLocation($lat, $lng) {}
    public function setAltitude($lat) {}
    public function render() {}
}

class Pinguin implements Aves {     // piguin por ser uma ave que não voa só implemeta a interfaçe 'Aves'
    public function setLocation($lat, $lng) {}
    public function render() {}
}

function abcdefghi (Aves $ave) {      // função 'abcdefghi...' reçebe a interfaçe 'Aves'
    $ave-> render();        // funçiona perfeitamente pois a interfaçe 'Aves' possui o método 'render'
}