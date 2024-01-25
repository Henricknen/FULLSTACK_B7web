<?php
require 'classes.php';      // puchando arquivo 'classes.php'

$book1 = new Book("Titulo do livro", "Autor do livro");     // passando o título e o autor do livro como parâmetros
$book2 = new Book("Historinha em quadrinhos", "Fulano");
$book3 = new Book("Ação", "Cicrano");
$book4 = new Book("Suspense", "Beltrano");

$booklist = new BookList();
$booklist->addBook($book1);
$booklist->addBook($book2);
$booklist->addBook($book3);
$booklist->addBook($book4);

while($booklist-> valid()) {        // loop para pegar todos os livros
    $livro = $booklist-> current();

    echo "Titulo". $livro-> getTitle(). " - ". $livro-> getAutor(). "<br>";

    $booklist-> next();
}

// $livro1 = $booklist-> current();
// echo "Livro 1: ". $livro1-> getTitle() ." - ". $livro1-> getAutor(). "<br>";

// $booklist-> next();

// $livro2 = $booklist-> current();
// echo "Livro 2: ". $livro2-> getTitle() ." - ". $livro2-> getAutor(). "<br>";

// $booklist-> reset();        // reseta a lista 

// $livro3 = $booklist-> current();
// echo "Livro 3: ". $livro3-> getTitle() ." - ". $livro3-> getAutor(). "<br>";