<?php
use PHPUnit\Framework\TestCase;      // importa a classe base TestCase do PHPUnit

class UsuarioTest extends TestCase {        // classe de teste 'UsuarioTest', que estende a classe TestCase do PHPUnit

    public function testExpectNomeCompleto() {          // método de teste que verifica se o método 'getNomeCompleto' retorna o nome completo corretamente

        $this->expectOutputString('Luis Henrique Silva Ferreira');      // define a 'saída' esperada para o teste

        $usuario = new Usuario();       // instancia um objeto
        $usuario-> setNome('Luis Henrique');      // define o nome
        $usuario-> setSobrenome('Silva Ferreira');       // define o sobrenome
        echo $usuario-> getNomeCompleto();       // chama o método 'getNomeCompleto' e imprime o resultado
    }

    public function testIdade() {

        // $usuario = new Usuario();
        // $usuario-> setIdade(32);     // código comentado pois 'setIdade' 'getIdade' ainda não foram implementados
        
        // $this-> assertEquals(32, $usuario-> getIdade());        // testando o retorno do teste idade

        $this-> markTestIncomplete('Falta implementar o [set] e o [get] de IDADE');     // método 'markTestIncomplete' mostra que o teste está incompleto
    }

    public function testIdadeString() {     // teste incompleto

        $this-> markTestIncomplete('Falta criar o método na classe');
    }
}
