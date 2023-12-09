<?php
class Pessoa {

    private $nome;
    private $idade;

    public function __construct($nome, $idade) {
        $this-> nome = $nome;
        $this-> idade = $idade;
    }

    public function getNome() {
        return $this-> nome;
    }

    public function getIdade() {
        return $this-> idade;
    }
}

class PessoaAdpter {        // criando um adaptador 'adter' para inserir ou fazer alterações
    private $profissao;
    private $pessoa;                   // dentro do 'adpter' é necessario manter a propria classe 'Pessoa'

    public function __construct(Pessoa $pessoa) {
        $this-> pessoa = $pessoa;       // 'variável' privada pessoa vai sendo o próprio 'objeto' pessoa
    }

    public function setProfissao($p) {        // quando se criar um objeto 'pessoAdpter' está pessoa terá o 'nome', 'idade' e também uma 'profissão'
        $this-> profissao = $p;
    }

    public function getProfissao() {
        return $this-> profissao;
    }

    public function getNome() {
        return $this-> pessoa-> getNome();
    }

    public function getIdade() {
        return $this-> pessoa-> getIdade();
    }

}

$pessoa = new Pessoa("Luis Henrique Silva Ferreira", 32);     // criação da 'pessoa' com suas limitações

$ad = new PessoaAdpter($pessoa);        // 'adpter' aproveitando as informações do  'Pessoa'
$ad-> setProfissao("FullStack");     // steando a profissão no 'adpater'

echo "Me chamo [". $ad-> getNome(). "] na data desta codificação tenho [". $ad-> getIdade(). "] sou um programador [". $ad-> getProfissao(). "]";

?>