<?php
use PHPUnit\Framework\TestCase;

class AssertativaTest extends TestCase {
    public function testArrayHaskey() {     // teste 'assertArrayHaskey'
        
        $a = new Assertativa();
        $array = $a-> getArray();

        $this-> assertArrayHaskey('nome', $array);      // ultilizando o 'assert' procurando chave 'nome'
    }
    
    public function testCount() {       // teste 'assertCount'
        
        $a = new Assertativa();
        $array = $a-> getArray();

        $this-> assertCount(2, $array);     // esperando reçeber '2' itens
    }
    
    public function testEmpty() {       // teste 'assertEmpty'
        
        $a = new Assertativa();
        $array = $a-> getArray();

        $this-> assertEmpty($array);        // verifica se array está vazio
    }
}