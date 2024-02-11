<?php
use PHPUnit\Framework\TestCase;     // 'funçionalidade' do phpunit

class CalculadoraTest extends TestCase {        // classe de teste 'extendendo' funçionalidade do phpunit

    public function testSoma() {        // cada método publico será um teste e o seu nome iniçiará com a palavra 'test'
        $calc = new Calculadora();

        $this-> assertEquals(2, $calc-> soma(1, 1));     // 'assertEquals' é que realizará o teste, sendo o primeiro parâmetro o que se espera como resultado e o segundo é o proçedimento do teste
    }

    public function testSoma2() {
        $calc = new Calculadora();

        $this-> assertEquals(-5, $calc-> soma(-10, 5));
    }

    public function testSoma3() {
        $calc = new Calculadora();

        $this-> assertEquals(25, $calc-> soma(14, 17));
    }
}