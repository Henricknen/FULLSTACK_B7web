<?php

class Language {        // classe responsável por fazer a manipulação das línguagens
    private $l;
    private $ini;

    public function __construct() {     // classe construtora define a linguagem que está setada
        $this-> l = 'pt-br';        // definindo português como linguagem padrão

        if (!empty($_SESSION['lang']) && file_exists('lang/' . $_SESSION['lang'] . '.ini')) {       // verificando se 'lang' está prenchido e se existe o 'diçionario' de idioma 'lang'
            $this-> l = $_SESSION['lang'];
        }

        $this-> ini = parse_ini_file('lang/'. $this-> l. '.ini');       // função 'parse_ini_file' lê o arquivo 'ini' e o transforma em um 'array'
    }

    public function getLanguage() {     // método 'getLanguage' retorna a liguagem que está definida
        return $this-> l;
    }

    public function get($word, $return = false) {
        $text = $word;
    
        if (isset($this->ini[$word])) {        // verificando se a palavra existe no array de tradução '$this->ini'
            $text = $this->ini[$word];      // substituindo '$text' pela tradução correspondente
        }
    
        if ($return) {      // Se $return for true, retorna a tradução
            return $text;
        } else {        // Se $return for false, imprime a tradução na saída
            echo $text;
        }
    }
}
