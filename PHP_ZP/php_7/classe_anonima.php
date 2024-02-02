<?php 

$carro = new class {        // 'classe anônima' é quando se cria uma classe dentro da propria instânçia e não é preçiso espeçificar o nome dela
    public function getName() {     // definindo método público 'getName'
        return "Carro 2.0";
    }
};

echo $carro-> getName();        // chamando o método getName() da classe anônima
echo "<br>";

// ------------------------------------------------------------------------------------------------------------------------------------------

function criar_carro() {        // definindo uma função chamada 'criar_carro' que retorna uma instância de uma classe anônima
    return new class {
        public function getName() {
            return "Carro 3.0";
        }
    };
}

$carro = criar_carro();     // instançiando classe fora da função
echo $carro-> getName();        // chamando o método 'getName' da instância da classe anônima e exibindo o resultado
echo "<br>";

// ------------------------------------------------------------------------------------------------------------------------------------------

$a = new class {         // classe anônima
    private $carro;
    public function setCarro($carro) {       // método definir o objeto $carro
        $this-> carro = $carro;
    }
    public function getName() {     // método para obter o nome do carro
        return $this-> carro-> getName();
    }
};

$a-> setCarro(new class {       // configurando o objeto '$carro' dentro da classe anônima '$a'
    public function getName() {
        return "Carro 4.0";
    }
});

echo $a-> getName();        // exibindo o nome do carro usando o método 'getName' da classe anônima 