<?php

class Post {
    
    private $titulo;        // definindo propriedades com 'private' privadas
    private $data;
    private $corpo;
    private $comentario;

    public function getTitulo() {       // método público 'getTitulo'
        return $this->titulo;     // retorndo a propriedade 'privada' título
    }

    public function setTitulo($t) {     // método 'setTitulo' reçbendo variável '$t' como parâmetro, para alterar o valor do título
        if(is_string($t)) {        // verificando se o que o usuário digitou foi uma 'string' para fazer a mudança do título
            $this-> titulo = $t;
        }
    }
}

$post = new Post();     // instançiando 'POst'
$post-> setTitulo("Titulo da postagem");

echo "Titulo: ". $post-> getTitulo();       // mostrando o título

?>