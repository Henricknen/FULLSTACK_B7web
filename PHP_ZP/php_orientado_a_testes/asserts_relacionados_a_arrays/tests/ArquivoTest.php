<?php 
use PHPUnit\Framework\TestCase;

class ArquivoTest extends TestCase {

    /**
    * @expectedException PHPUnit\Framework\Error\Error
    */

    public function testFalhouInclude() {        // teste verifica se arquivo não existe, se não existir dará 'ok'
        include 'config.php';
    }

    public function testInclude() {

        $this-> assertTrue(
            file_exists('config.php')      // teste verifica se arquivo existe 'file_exists' faz a verificação se arquivo existente
        );
    }
}