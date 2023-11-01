<?php

class Post {
    
    private $titulo;
    private $data;
    private $corpo;
    private $comentario;

    public function __construct($t, $c) {     // método 'construct' sempre é publico passando parâmetros '$t' título e '$c' corpo
        $this-> setTitulo($t);      // 'construct' chamando método 'setTitulo' e setando o título
        $this-> setCorpo($c);
    }

    public function getTitulo() {
        return $this-> titulo;
    }
    
    public function getCorpo() {
        return $this-> corpo;
    }

    public function setTitulo($t) {
        if(is_string($t)) {
            $this-> titulo = $t;
        }
    }

    public function setCorpo($c) {      // método 'setCorpo' público reçebendo '$c' como parâmetro
        $this-> corpo = $c;     // alterando a propriedade 'corpo'
    }
}

$post = new Post("[[Titulo da postagem]]", "[[Corpo da da minha postagem]]");     // instançiando o objeto 'POst' com um 'título'

echo "O título ". $post-> getTitulo(). " e o Corpo ". $post-> getCorpo(). " da Postagem";

?>