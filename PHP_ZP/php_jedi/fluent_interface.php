<?php
class Person {      // classe 'Pessoa'
     private $name;
     private $lastname;
     private $job;

     public function setName($n) {      // método 'setName' reçebe alguma coisa
        $this-> name = $n;
        return $this;
     }

     public function setLastName($n) {
        $this-> lastname = $n;
        return $this;       // para poder ultilizar a classe com métodos seguidos é necessario ultilizar 'return $this'
     }
     
     public function setJob($n) {
        $this-> job = $n;
     }

     public function getFullName() {        // método retorna o nome completo
        return $this-> name. ' '. $this-> lastname. '<br>Profisional: '. $this-> job ;
     }

}

$person = new Person();     // criando uma pessoa
$person-> setName('Luis Henrique')-> setLastName('Silva Ferreira')-> setJob('FullStack');       // definindo propriedades da classe

echo "Nome: ". $person-> getFullName();         // pegando o nome completo