<?php
class Post {
    private int $id;
    private int $likes = 0;     // '$likes' só pode ser alterada dentro da classa pai pois está definida como 'private'

    protected function setId($i) {      // método 'protected' só pdoe ser ultilizado dentro da mesma classe ou quem herda-la
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

class Foto extends Post {
    private $url;

    public function __construct($id) {
        $this-> setId($id);
        $this-> setLikes(30);
        // $this-> id = 900;       // alteração da propriedade '$id' de 'Post' não será permitida pois esta está definada como 'private'
    }

    public function setUrl($u) {
        $this-> url = $u;
    }

    public function getUrl() {
        return $this-> url;
    }
}

$foto = new Foto(20);       // definição do 'id' da foto
$foto-> setUrl('Private_e_Protected');

echo "Foto: #". $foto-> getId(). " - ". $foto-> getLikes(). " Likes - ". $foto-> getUrl();