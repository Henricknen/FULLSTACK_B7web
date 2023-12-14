<?php

class Facebook {

    public function createPost() {      // método 'createPost' instançia uma classe de ações
        return new Post();
    }
}

class Post {        // está classe terá todos atributos e eções que a postagem preçisa

    private $athor;
    private $message;

    public function setAuthor($authorName) {
        $this-> author = $authorName;
    }
    public function getAuthor() {
        return $this-> author;
    }

    public function setMessage($message) {
        $this-> message = $message;
    }
    public function getMessage() {
        return $this-> message;
    }

}