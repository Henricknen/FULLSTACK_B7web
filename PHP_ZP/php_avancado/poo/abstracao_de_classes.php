<?php

abstract class Animal {     // 'abstract' transforma a classe em uma classe 'abstrata'
    protected $nome;        // 'protected' para permitir acesso nas subclasses
    private $idade;

    abstract protected function andar();        // função 'abstrata' deve ser sempre protegida

    public function setNome($n) {
        $this->nome = $n;
    }

    public function getNome() {
        return $this->nome;
    }
}

class Cavalo extends Animal {
    private $quantidade_de_patas;
    private $tipo_de_pelo;

    public function andar() {       // para o código funcionar obrigatoriamente a classe 'Cavalo' tem que ter um método 'andar'

    }
}

$cavalo = new Cavalo();
$cavalo->setNome("Cavalo novo");

echo "Este cavalo é um: " . $cavalo->getNome();

?>

