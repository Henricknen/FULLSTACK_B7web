<?php

class Post {
    
    private $titulo;
    private $data;
    private $corpo;
    private $comentarios;
    private $qtComentarios;       // propriedade salva quantos comentários já tem

    public function getTitulo() {
        return $this-> titulo;
    }
    
    public function setTitulo($t) {
        if (is_string($t)) {
            $this-> titulo = $t;
        }
    }

    public function addComentario($msg) {
        $this-> comentarios[] = $msg;
        $this-> contarComentarios();
    }

    public function getQuantComentarios() {         // função 'getQuantComentarios' retorna quantos comentários tem 
        return $this-> qtComentarios;
    }

    private function contarComentarios() {        // função 'auxiliar' é 'private' pois é um tipo de método que não pode ser usado do lado de fora do objeto
        $this-> qtComentarios = count($this-> comentarios);
    }
}

$post = new Post();

$post-> addComentario("comentario 1");
$post-> addComentario("comentario 2");
$post-> addComentario("comentario 3");

echo "Quantidade de comentários: " . $post-> getQuantComentarios();


?>