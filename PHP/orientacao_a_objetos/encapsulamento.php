<?php
class Post {
    public int $id;
    public int $likes = 0;
    public array $comments = [];
    private string $author;     // declarando propriedade privada '$author' é 'private' e só poderar ser alterada através do método 'setAuthor'


    public function aumentarLike() {
        $this-> likes++;
    }

    public function setAuthor($n) {     // método 'setAuthor' reçebendo um nome como parâmetro e irá setar 'alterar, modificar' a informação
        if(strlen($n) >= 3) {       // criando um sistema de proteção, verificando se 'setAthour' é maior que 3 caracteres
            $this-> author = ucfirst($n);        // atribuindo '$n' á propriedade 'author', 'ucfirst' transforma o primeiro caracter da variável em maiúsculo
        }
    }

    public function getAuthor() {           // método 'getAuthor' retorna o valor da propriedade privada '$author' da classe
        return $this-> author ?? 'Visitante';       // se tiver 'author' usa ele se não tiver usa 'Visitante'
    }
}

$post1 = new Post();
$post1-> setAuthor('luis');     // definindo o autor, ultilizando 'setAuthor' para se ter total controle da variável

$post2 = new Post();
$post2-> setAuthor('Henrique');


echo "POST 1: ". $post1-> likes. " likes - ". $post1-> getAuthor(). "<br>";     // ultilizando 'getAuthor()' para pegar as informações tratadas pelo método 'setAuthor()'
echo "POST 2: ". $post2-> likes. " likes - ". $post2-> getAuthor(). "<br>";