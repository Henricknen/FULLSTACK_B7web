<?php

interface VideoServiceInterface {       // definindo uma interface para serviços de vídeo
    public function getEMBED();      // método para obter o código de incorporação do vídeo
}

class Youtube implements VideoServiceInterface {        // implementação específica para o serviço YouTube
    private $url;

    public function __construct($url) {
        $this-> url = $url;
    }

    public function getEMBED() {
        return '<iframe>'. $this-> url. '</iframe>';
    }
}

class Vimeo implements VideoServiceInterface {      // implementação específica para o serviço Vimeo
    private $url;

    public function __construct($url) {
        $this-> url = $url;
    }

    public function getEMBED() {
        return '<video>'. $this-> url. '</video>';
    }
}

class Wistia implements VideoServiceInterface {     // implementação específica para o serviço Wistia
    private $url;

    public function __construct($url) {
        $this-> url = $url;
    }

    public function getHTML() {
        return '<coisa>'. $this-> url. '</coisa>';
    }
}

class Aula {        // classe que representa uma aula com um serviço de vídeo específico
    private $video;

    public function __construct(VideoServiceInterface $video) {
        $this-> video = $video;
    }

    public function getVideoHtml() {        // método para obter o código de incorporação do vídeo
        return $this-> video-> gEtEMBED();
    }
}

$aula = new Aula(new Youtube('123'));       // criando uma instância de Aula com o serviço YouTube

echo "HTML: ". $aula-> getVideoHtml();      // exibindo o HTML do vídeo
?>

