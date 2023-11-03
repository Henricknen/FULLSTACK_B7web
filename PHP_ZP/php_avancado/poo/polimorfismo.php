<?php

class Animal {

    public function getNome() {     // método 'getNome'
        echo "'getNome' da classe animal...";
    }
    
    public function testar() {      // método 'testar'
        echo "Testado...";
    }
}

class Cachorro extends Animal {     // classe 'Cachorro' extendendo 'extends' classe 'Animal' ou seja herdando todas  métodos, propriedades e funções

    public function getNome() {         // 'polimorfismo' é quando 'substitui-se' um método ou uma ação por uma ação nova
        $this-> testar();       // ultilizando o método 'testar' dentro do novo método 'getNome'
    }
}

$cachorro = new Cachorro();     // instançiando classe 'Cachorro'
$cachorro-> getNome();      // por está herdando os atributos da classe 'Animal' getNome funçionsrá corretamente


?>