<?php

use Cachorro as GlobalCachorro;

class Cachorro {        // classe 'cachorro' é só a estrutura que será usanda
    
    public function latir() {       // método 'latir' definindo uma ação da classe
        echo "Au Au";       // executando uma ação
    }
}

$luke = new Cachorro();     // 'new' 'instançia' um objeto 'Cachorro' na variável '$cachorro'
$luke-> latir();        // executando a ação 'latir'

$meg = new Cachorro();
$meg-> latir();

?>