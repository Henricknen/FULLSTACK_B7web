<?php
use PHPUnit\Framework\TestCase;

class CalculadoraTest extends TestCase {    // classe de teste extendendo funçionalidade do 'php unit'

    public function testSoma() {        // método de teste 'testSoma'
        $calc = new Calculadora();

        $this-> assertEquals(     // método 'assertEquals' realiza o teste
            2,      // este parâmetro é o que se espera como resultado
            $calc-> soma(1, 1)        //  '$calc-> soma(1, 1)' é a execução da calculadora  
        );
    }
    
    public function testSoma2() {       // segundo teste
        $calc = new Calculadora();

        $this-> assertEquals(
            -5,
            $calc-> soma(-10, 5)
        );
    }
    
    public function testSoma3() {       // simulando 'erro'
        $calc = new Calculadora();

        $this-> assertEquals(
            35,     // resultado diferente do esperado
            $calc-> soma(10, 15)
        );
    }

}