<?php
final class StaticFactory {     // 'StaticFactory'é uma 'fábrica', classe estática
    public static function make($type) {
        if($type == 'number') {     
            return new FormatNumber();      // se type for igual number será intançiado 'FormatNumber'
        }

        if($type == 'string') {
            return new FormatString();      // se for igual a string 'FormatString'
        }
    }
}

interface FormatterInterface {      // interfaçe 'FormatterInterface' padroniza os dois objetos 
    public function format($n);
}

class FormatNumber implements FormatterInterface {      // objeto 'FormatNumber' ultilizando 'FormatterInterface'
    public function format($n) {
        echo 'Formatando número: '. $n;
    }
}

class FormatString implements FormatterInterface {
    public function format($n) {
        echo 'Formatando string: '. $n;
    }
}

$formatter = StaticFactory:: make("string");    // criando um formatador 'formatter' de string
$formatter-> format("testando 1, 2, 3");    // ultilizando o formatador através do 'formart'