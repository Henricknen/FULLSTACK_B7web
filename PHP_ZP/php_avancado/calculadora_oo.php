<?php

class Calculadora {

    private $n;         // variável privada para armazenar o número atual

    public function __construct($numeroInicial) {
        $this->n = $numeroInicial;      // construtor inicia a calculadora com um número inicial
    }

    public function somar($n1) {
        $this->n += $n1;        // método para somar $n1 ao número atual
        return $this;       // retorna o próprio objeto para permitir encadeamento de métodos.
    }

    public function subtrair($n1) {
        $this->n -= $n1;        // método para 'subtrair'
        return $this;
    }

    public function multiplicar($n1) {
        $this->n *= $n1;            // método para multiplicar
        return $this;
    }

    public function dividir($n1) {
        $this->n /= $n1;        // método para 'dividir'
        return $this;
    }

    public function resultado() {
        return $this->n;            // método para obter o 'resultado'
    }
}

$calc = new Calculadora(10);        // instânciando a classe 'Calculadora' com número 10
$calc->somar(2)->subtrair(3)->multiplicar(5)->dividir(2);       // encadeia as operações
$resultado = $calc->resultado();        // obtendo o resultado final

echo "Resultado é: " . $resultado;      // 'exibindo' na tela o resultado.

?>