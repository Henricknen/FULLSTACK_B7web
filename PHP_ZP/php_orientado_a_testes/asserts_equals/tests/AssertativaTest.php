<?php
use PHPUnit\Framework\TestCase;

class AssertativaTest extends TestCase {
    
    public function testEqual() {

        $nome = 'Luis Henrique Silva Ferreira';
        $this-> assertEquals('Luis Henrique Silva Ferreira', $nome);        // teste verifica se nome passado como parâmetro é igual ao da variável
    }

    public function testString() {

        $profissional = 'FullStack';
        $this-> assertStringStartsWith('Fu', $profissional);        // verifica se parâmetro é as iniçiais da variável '$profissional'

        $this-> assertStringEndsWith('ck', $profissional);      // verifica se parâmetro é as últimas letras da variável '$profissional'
    }

    public function testNumeros1() {

        $totalUsuarios = 10;
        $this-> assertGreaterThanOrEqual(10, $totalUsuarios);       // testa de o primeiro parâmetro é maior ou igual ao valor da variavél '$totalUsuariios'
    }

    public function testNumeros2() {

        $totalUsuarios = 10;
        $this-> assertLessThanOrEqual(10, $totalUsuarios);      // verifica se primeiro parâmetro é menor ou igual ao valor da variável
    }

}