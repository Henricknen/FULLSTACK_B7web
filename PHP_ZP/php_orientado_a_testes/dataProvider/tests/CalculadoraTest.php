<?php
use PHPUnit\Framework\TestCase;

class CalculadoraTest extends TestCase {

    /**
    * @dataProvider somaDataProvider
    */

    public function testSoma($n1, $n2, $esperado) {        // método reçebe como parâmetro os dados passados pelo método 'somaDataProvider'
        $calc = new Calculadora();

        $this-> assertEquals(
            $esperado,
            $calc-> soma($n1, $n2));    
    }

    public static function somaDataProvider() {     
        return array(       // array de 'arrays de testes'
            array(1, 1, 2),     // os dois primeiros parâmetros são os dois números que serão somados e o terçeiro é o resultado esperado
            array(25, 7, 32),
            array(7, 3, 10),
            array(57, 37, 96),      // inserindo teste com resultado 'maior' do que o esperado que dará erro, para teste 
        );
    }
}