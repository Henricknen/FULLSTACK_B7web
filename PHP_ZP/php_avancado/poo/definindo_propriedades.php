<?php

use Cachorro as GlobalCachorro;

class Cachorro {

    public $nome;      // variável que pode ser acessada externamente
    private $idade;      // variável que só pode ser acessada internamente

}

$cachorro = new Cachorro();     // instançiando o objeto
$cachorro-> nome = "Luke";

echo "O nome do meu cachorro é: ". $cachorro-> nome;

?>