<?php

class Language {
    private $l;
    private $ini;
    private $bd;    // definindo variável 'bd' que vem do banco com 'private'

    public function __construct() {
        $this-> l = 'pt-br';

        if (!empty($_SESSION['lang']) && file_exists('lang/'. $_SESSION['lang']. '.ini')) {
            $this-> l = $_SESSION['lang'];
        }

        $this-> ini = parse_ini_file('lang/'. $this-> l. '.ini');

        global $pdo;
        $sql = "SELECT * FROM lang WHERE lang = :lang";
        $sql = $pdo -> prepare($sql);
        $sql-> bindValue(":lang", $this-> l);
        $sql-> execute();

        if($sql-> rowCount() > 0) {     // verificando se existe algum item
            foreach($sql-> fetchAll() as $item) {       // montando um array do itens do 'banco de dados'
                $this-> bd[$item['nome']] = $item['valor'];     // em '$this-> bd' se tem todos itens de tradução que está no 'banco de dados'
            }
        }
    }

    public function getLanguage() {
        return $this-> l;
    }

    public function get($word, $return = false) {
        $text = $word;
    
        if (isset($this-> ini[$word])) {        // verificando os 'itens' da tela
            $text = $this-> ini[$word];
        }
        elseif(isset($this-> bd[$word])) {// verificando os 'itens' do 'banco de dados'
            $text = $this-> bd[$word];
        }
    
        if ($return) {
            return $text;
        } else {
            echo $text;
        }
    }
}
