<?php
use PHPUnit\Framework\TestCase;

class AssertativaTest extends TestCase {
    public function testArrayHaskey() {     // teste 'assertArrayHaskey'
        
        $a = new Assertativa();
        $array = $a-> getArray();

        $this-> assertArrayHaskey('nome', $array);      // ultilizando o assertiva 'assertArrayHaskey' procurando chave 'nome'
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

    public function testContain() {     // teste 'assertContain'

        $array = array(1, 2, 3, 4, 5, 'Luis Henrique Silva Ferreira');

        $this-> assertContains('Luis Henrique Silva Ferreira', $array);      // assertiva procurará no array a string 'Luis Henrique Silva Ferreira'
    }

    public function testContainOnly() {     // teste 'assertContainOnly'

        $array = array(1, 2, 3, 4, 5);

        $this-> assertContainsOnly('int', $array);       // assertiva procurará pelo tipo 'int'
    }

    public function testAttributExists() {      // teste vai testar se existe um atributo em uma classe

        $this->assertClassHasAttribute('numero', 'Assertativa');      // assertiva 'assertClassHasAttribute' é ultilizanda para buscar atributos espeçificos em uma classe
    }

    public function testRegex() {       // teste 'assertRegExp'

        $this->assertMatchesRegularExpression('/^[a-z]{3}$/', 'Ola');       // expressão regular basica só reçeberá letras de 'a' a 'z' e apenas 'três' caracteres
    }

}