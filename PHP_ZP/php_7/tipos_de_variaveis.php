<?php 

class Carro {
    private $pdo;
    public function __construct(PDO $pdo) {     // 'PDO' só permite reçeber uma classe do tipo 'pdo'
        $this-> pdo = $pdo;     // atribui o objeto PDO 'recebido' à propriedade $pdo da classe Carro
    }
}
// --------------------------------------------------------------------------------------------------------------------------------------------------------------------------

class Numero {

}

function somar(Numero $a, float $b) {       // $a reçebe objeto da classe Numero como parâmetro
    return $a + $b;
}

$n = new Numero();      // criação de objeto 'Numero'

echo "Soma: ". somar($n, 3);        // realizando uma injeção de dependênçia, passando objeto como parâmetro

// ------------------------------------------------ função somarFloat -----------------------------------------------------------------------------------------------
function somarFloat(float $a, float $b) {        // função reçebe dois valores como parâmetros com tipo de variável, tipo 'float' além de inteiros pode somar números decimais
    return $a + $b;
}

echo "Soma é: ". somarFloat(1.5, 5.2);

echo "<br>";

// ------------------------------------------------ função soma --------------------------------------------------------------------------------------------------------

function soma(float $a, float $b):float {        // ':float' espeçifica que o retorno da função tem que ser do tipo 'float'
    return $a + $b;
}

echo "Soma: ". soma(1.5, 5.2);

echo "<br>";

// ------------------------------------------------ função dividirInteiro ------------------------------------------------------------------------------------------

function dividirInteiro(int $a, int $b) {        // o tipo 'int' indica que a variável é do tipo inteiro
    return $a / $b;
}

echo "Resultado da divisão é: ". dividirInteiro(8, 2);

