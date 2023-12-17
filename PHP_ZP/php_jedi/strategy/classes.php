<?php
interface OutputInterface {
    public function load($array);
}

class JsonOutput implements OutputInterface {
    public function load($array) {
        return json_encode($array);      // transformando 'array' em 'json'
    }
}

class ArrayOutput implements OutputInterface {
    public function load($array) {
        return $array;      // retornando só 'array' pois ele já é um array
    }
}

class Produtos {

    private $array;     // variável guadará os itens
    private $output;        // guarda o objeto de retorno

    public function getLista() {
        $this-> array = array(
            array('nome'=> 'Luis', 'id'=> '1'),
            array('nome'=> 'Henrique', 'id'=> '2')
        );
    }

    public function setOutput(OutputInterface $outputType) {      // ultilizando interfaçe 'OutputInterface' para reçeber o objeto
        $this-> output = $outputType;
    }

    public function getOutput() {
        return $this-> output-> load($this-> array);       // mandando variável 'array' como parâmetro
    }

}