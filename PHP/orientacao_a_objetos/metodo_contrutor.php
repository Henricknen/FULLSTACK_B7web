<?php
class Post {
    public int $likes = 0;
    public array $comments = [];
    public string $author;

    public function __construct($qtLikes = 0) {   // ultiliza '__construct' para se criar um método construtor e '$qtLikes = 0' é o reçebimento dos parâmetros dos objeto e asumirá o valor '0' caso o objeto não passe nada de valor
        $this-> likes = $qtLikes;       // definindo a quantidade de 'likes'
    }

    public function aumentarLike() {
        echo "abbcdef";
        $this-> likes++;
    }
}

$post1 = new Post();        // criação do objetro '$post' sem parâmetros
$post2 = new Post(25);            // criação do objeto '$post2' já com a informação correta, passada como parâmetro 


echo "POST 1: ". $post1-> likes. "<br>";
echo "POST 2: ". $post2-> likes. "<br>";