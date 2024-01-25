<?php
class Book {        // classe livro
    private $title;
    private $autor;

    public function  __construct($title, $autor) {      // construtor reçebe os parametros para criar o livro
        $this-> title = $title;     // transferindo o valor da variavel '$title' para propriedade 'title'
        $this-> autor = $autor;
    }

    public function getTitle() {        // método 'public' pode ser acessado de fora da classe e ele retorna o valor da propriedade '$title'
        return $this-> title;
    }

    public function getAutor() {
        return $this-> autor;
    }
}

class BookList {        // classe lista de livros
    private $books;         // esta propriedade armazenará a lista de livros que existe neste objeto
    private $currentIndex;

    public function __construct() {     // construtor irá zerar o index
        $this-> currentIndex = 0;
    }

    public function addBook(Book $book) {       // função vai adiçionar um novo livro no array 'books'
        $this-> books[] = $book;
    }

    public function count() {       // vai retornar quantos livros tem na biblioteca
        return count($this-> books);
    }

    public function removeBook(Book $book) {
        foreach($this-> books as $key => $value) {      // loop
            if(($value-> getTitle(). $value-> getAutor()) == ($book-> getTitle(). $book-> getAutor())) {
                unset($this-> books[$key]);        // remoção
            }
        }

        $this-> books = array_values($this-> books);     // reodernando os livros em ordem crescente
    }

    public function current() {     // método retorna o livro do indiçe atual
        return $this-> books[$this-> currentIndex];
    }

    public function next() {        // apenas inclementa o 'currentindex'
        $this-> currentIndex++;
    }

    public function key() {     // método diz qual é a chave atual
        return $this-> currentIndex;
    }

    public function reset() {       // método vai resetar a contagem
        $this-> currentIndex = 0;
    }

    public function valid() {       // método verifica se a chave é válida(existe)
        if(isset($this-> books[$this-> currentIndex])) {
            return true;
        } else {
            return false; 
        }
    }

}