<?php 

class Usuario {
    private $nome;          // propriedades privadas para armazenar o 'nome' e 'sobrenome' do usuário
    private $sobrenome;

    public function setNome($n) {           // método 'set' público para definir o 'nome' do usuário
        $this-> nome = $n;       // define o valor da propriedade $nome
    }

    public function setSobrenome($n) {
        $this-> sobrenome = $n;
    }

    public function getNomeCompleto() {         // método 'get' público para retornar o nome completo do usuário
        echo $this-> nome . ' ' . $this-> sobrenome;       // retorna o nome completo do usuário
    }

}

