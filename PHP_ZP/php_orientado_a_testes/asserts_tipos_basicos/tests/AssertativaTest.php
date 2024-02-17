<?php
use PHPUnit\Framework\TestCase;

class AssertativaTest extends TestCase {
    
    public function testBoolean1() {

        $this-> assertTrue(is_file('lista1.txt'));      // teste verifica se lista1.txt é um 'is_file' arquivo
    }
    
    public function testBoolean2() {

        $this-> assertFalse(is_file('tests'));      // teste verifica se arquivo passado como parâmetro não é um arquivo
    }

    public function testNull() {

        $idade = null;
        $this-> assertNull($idade);     // teste espera um resultado 'null'
    }

    public function testVarType() {

        $a = new Assertativa();
        $this-> assertIsArray($a-> getArray());       // teste testa o tipo de variável passando o valor '$a-> getArray()' que será verificado como parâmetro
    }

}