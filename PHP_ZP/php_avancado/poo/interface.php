<?php

interface Animal {      // 'interface' define uma interfaçe

    public function andar();        // métodos, fuções, ações que a 'interface' terá deve ser 'public' e eles não devem ter conteúdos

}

class Cachorro implements Animal {      // classe "cachorro' está implementando a interface 'Animal' então terá que implementar o método 'andar'

     public function andar() {
        echo "Esta andando...";
    }
}

$cachorro = new Cachorro();     // 'definindo' a classe Cachorro
$cachorro-> andar();        // ultilizando o método 'andar'

?>