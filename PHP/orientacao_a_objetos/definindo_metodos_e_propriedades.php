<?php
class Post {
    public $likes = 0;      // 'public' define a propriedade como pública
    private $comments = [];     // 'private' propriedade privada só é possível acesar internamente
    protected $author;    // 'protected' é similar a propriedade 'private' 

    public function aumentarLike() {        // método 'aumentarLike'
        $this-> likes++;        // '$this' dá acesso a propriedade da propria classe
    }
}

$post1 = new Post();        // objeto '$post1' importando classe pública 'Post' com as propriedades
$post1-> aumentarLike();        // executando método 'aumentarLike'
$post1-> aumentarLike();
$post1-> aumentarLike();

$post2 = new Post();
$post2-> aumentarLike();
$post2-> aumentarLike();

echo "POST 1: ". $post1-> likes. "<br>";
echo "POST 2: ". $post2-> likes. "<br>";