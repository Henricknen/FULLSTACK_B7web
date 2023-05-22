<?php
class Post {
    private int $id;
    private int $likes = 0;
                                
    public function setId($i) {    // encapsulando '$id' e '$likes'
        $this-> id = $i;
    }

    public function getId() {
        return $this-> id;
    }

    public function setLikes($n) {
        $this-> likes = $n;
    }

    public function getLikes() {
        return $this-> likes;
    }

}

class Foto extends Post {       // 'extends' faz a classe 'Foto' herdar a classe 'Post'
    private $url;

    public function __construct($id) {      // criação de 'construtor' que reçebe o '$id'
        $this-> setId($id);     // ultilizando 'setId' criado na classe 'Post'
    }

    public function setUrl($u) {        // método 'setUrl' é uma caracteristica adiçional da classe 'Foto'
        $this-> url = $u;
    }

    public function getUrl() {      // método 'getUrl' da classe 'Foto'
        return $this-> url;
    }
}

$foto = new Foto(20);       // criando objeto 
$foto-> setLikes(12);   // 'setando' inserindo a quantidade de 'Likes'
$foto-> setUrl('Herança');

echo "Foto: #". $foto-> getId(). " - ". $foto-> getLikes(). " Likes - ". $foto-> getUrl();