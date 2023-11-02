<?php

class Animal {      // classe 'Animal' servirá como um complemento pra as outras classes pois todo animal tem um nome e uma idade
    public $nome;
    private $idade;
}

class Cavalo extends Animal {       // classe 'Cavalo' estendendo a classe 'Animal' e reçebendo os seus atributos '$nome' e '$idade'
    private $quantidade_de_patas;
    private $tipo_de_pelo;
}

class Gato extends Animal {
    private $quantidade_de_patas;
    private $miado;
}

$cavalo = new Cavalo();     //  criando uma instância da classe 'Cavalo'
$cavalo-> nome = "Cavalo 1";        // usando característica 'nome' que tem dentro da classe 'Animal'

echo "O nome do cavalo é: ". $cavalo-> nome;

?>