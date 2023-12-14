<?php
require 'facebook.php';

$fb = new Facebook();       // intançiando a biblioteca 'Facebook' para ultiliza lá

$post = $fb-> createPost();     // criando uma postagem nova
$post-> setAuthor("Luis Henrique Silva Ferreira");
$post-> setMessage("Programador fullStack");

echo "Autor: ". $post-> getAuthor();
echo "<br/>Menssagem: ". $post-> getMessage();
echo '<hr/>';

$post2 = $fb-> createPost();        // criando outra postagem
$post2-> setAuthor("Luis Henrique Silva Ferreira");
$post2-> setMessage("Autodidata");

echo "Autor: ". $post2-> getAuthor();
echo "<br/>Menssagem: ". $post2-> getMessage();