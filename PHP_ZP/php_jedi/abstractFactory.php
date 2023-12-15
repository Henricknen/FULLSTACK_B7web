<?php
abstract class Video {      // definindo uma classe abstrata Video com um método abstrato render()
    abstract public function render();
}

abstract class AbstractFactory {        // definindo uma classe 'abstrata' AbstractFactory com um método abstrato createPlayer()
    abstract public function createPlayer($url);
}

class HtmlFactory extends AbstractFactory {     // implementando a classe HtmlFactory que herda de 'AbstractFactory'
    public function createPlayer($url) {        // implementando o método createPlayer da fábrica HTML
        return new htmlPlayer($url);        // retornando uma instância de htmlPlayer com a URL fornecida
    }
}

class htmlPlayer extends Video {        // implementando a classe htmlPlayer que herda de Video
    private $url;       // propriedade privada para armazenar a URL do vídeo

    public function __construct($url) {     // construtor que recebe a URL ao instanciar a classe
        $this->url = $url;
    }

    public function render() {      // implementação do método render() que 'exibe' o vídeo HTML
        echo '<video>' . $this->url . '</video>';
    }
}

class FlashFactory extends AbstractFactory {
    public function createPlayer($url) {
        return new flashPlayer($url);
    }
}

class flashPlayer extends Video {       // implementando a classe flashPlayer que 'herda' de Video
    private $url;       // propriedade privada para armazenar a URL do vídeo

    public function __construct($url) {     // construtor que recebe a URL ao instanciar a classe
        $this-> url = $url;
    }

    public function render() {      // implementação do método render() que exibe o vídeo Flash
        echo '<object>' . $this-> url . '</object>';
    }
}

// $fac = new HtmlFactory();   // instância da fábrica HTML
$fac = new FlashFactory();       // instância da fábrica Flash

$player = $fac-> createPlayer("123");    // criando um player usando a fábrica e passando uma URL
$player-> render();      // renderizando o vídeo usando o método render() da classe específica do player criado
