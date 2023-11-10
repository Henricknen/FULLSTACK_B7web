<?php

class Usuario {

    private $id;        // propriedades definidas como 'private' iguais ao do banco de dados
    private $nome;
    private $email;
    private $senha;

public function getId() {       // método 'getId' pega o 'id'
    return $this-> id;
}

public function setEmail($e) {      // método 'setEmail' ultilizado para alterar o email do usuário
    $this-> email = $e;
}

public function getEmail() {
    return $this-> email;
}


public function setSenha($s) {
    $this-> senha = s;
}

public function setNome($n) {
    $this-> nome = $n;
}

public function getNome() {
    return $this-> nome;
}

}

?>