<?php
class Post {
    public int $likes = 0;      //  criando uma proteção, definindo o type 'int' para variável '$likes'
    public array $comments = [];    // type definido como 'array'
    public string $author;              // protegendo variável, do type 'string' para variável '$author'

    public function aumentarLike() {
        $this-> likes++;
    }
}

$post1 = new Post();
// $post1-> likes = 'Luis Henrique Silva Ferreira';        // executará um erro pois a variável 'likes' ta reçebendo uma 'string'
$post1-> likes = 1000;


$post2 = new Post();


echo "POST 1: ". $post1-> likes. "<br>";
echo "POST 2: ". $post2-> likes. "<br>";