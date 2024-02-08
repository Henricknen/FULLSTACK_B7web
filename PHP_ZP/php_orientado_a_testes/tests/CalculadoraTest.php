<?php
use PHPUnit\Framework\TestCase;

class CalculadoraTest extends TestCase {    // classe de teste extendendo funçionalidade do 'php unit'

    /**
    * @dataProvider somaDataProvider
    */

    public function testSoma($n1, $n2, $esperado) {        // método de teste 'testSoma'
        $calc = new Calculadora();

        $this-> assertEquals(     // método 'assertEquals' realiza o teste
            $esperado,      // este parâmetro é o que se espera como resultado
            $calc->soma($n1, $n2)        //  '$calc-> soma(1, 1)' é a execução da calculadora  
        );
    }
    
    public static function somaDataProvider(): array {        // função adiçional 'somaDataProvider' retorna um array de testes
        return array(
            array(1, 2, 3),     // o 'primeiro' e o 'segundo' parâmetros são os dois números que serão somados e o 'terçeiro' é o resultado que se espera da soma
            array(50, 53, 103),
            array(87, 23, 110),
            array(35, 25, 75)       // array dará erro pois os valores passados não batem com o resultado esperado
        );
    }
}