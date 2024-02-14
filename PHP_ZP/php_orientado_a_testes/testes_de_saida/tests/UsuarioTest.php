<?php
use PHPUnit\Framework\TestCase;      // importa a classe base TestCase do PHPUnit

class UsuarioTest extends TestCase {        // classe de teste 'UsuarioTest', que estende a classe TestCase do PHPUnit

    public function testExpectNomeCompleto() {          // método de teste que verifica se o método 'getNomeCompleto' retorna o nome completo corretamente

        $this->expectOutputString('Luis Henrique Silva Ferreira');      // define a 'saída' esperada para o teste

        $usuario = new Usuario();       // instancia um objeto
        $usuario->setNome('Luis Henrique');      // define o nome
        $usuario->setSobrenome('Silva Ferreira');       // define o sobrenome
        echo $usuario->getNomeCompleto();       // chama o método 'getNomeCompleto' e imprime o resultado
    }
}
