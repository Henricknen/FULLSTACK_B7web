<?php
class Post {        // classe 'Post'
    public $likes = 0;     // definindo as características desta classe
    public $comments = [];     // definição de 'lista' de comentarios
    public $author;
}

$post1 = new Post();        // comando 'new' cria um 'objeto' que será assoçiado a variável '$post1'
$post1-> likes = 3;      // definindo propriedade 'likes' de '$post1'

$post2 = new Post();        // comando 'new' cria um 'objeto' que será assoçiado a variável '$post2'
$post2-> likes = 10;      // definindo propriedade 'likes' de '$post2'

echo "POST 1: ". $post1-> likes. "<br>";
echo "POST 2: ". $post2-> likes. "<br>";