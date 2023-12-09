<?php
class Pessoa {

    private $nome;
    private $idade;

    public static function getInstance() {      // método publico 'getInstance' retorna a instançia

        static $intance = null;     // variável 'intance' será a instançia
        if($intance === null) {
            $intance = new Pessoa();
        }
        return $intance;
    
    }

    private  function __construct() {       // 'proteção' criando o construtor de forma privada evitando que outra variável instançie o 'objeto'

    }

    public function setNome($n) {       // métodos
    $this-> nome = $n;        
    }

    public function getNome() {
        return $this-> nome;
    }

    public function setIdade($i) {
    $this-> idade = $i;        
    }

    public function getIdade() {
        return $this-> idade;
    }
}

$nome = Pessoa::getInstance();      // 'intançiando' a classe Pessoa
$nome-> setNome("Luis Henrique Silva Ferreira");

$idade = Pessoa::getInstance();      // pegando a mesma 'instançia' da variável 'nome'
$idade-> setIdade(32);

echo "Me chamo: [". $nome-> getNome(). "] e na data desta codificação tenho: [". $idade-> getIdade(). "] anos...";

?>