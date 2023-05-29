<?php
class Usuario {     // classe tendo duas responsibilidade, viola o princípio 'single responsibility principe'

    public function setNome() {}   // 1º responsabilidade, métodos 'setNome' e 'getNome' que irá definir o usuário
    public function getNome() {}

    public function add() {}    // 2º responsabilidade, métodos relaçionados a manipulação do dado no banco de dados
    public function updadate() {}
    public function delete() {}
}

class Usuarioo {     // classe de acordo com o princípio 'single responsibility principe'

    public function setNome() {}        // 1º responsabilidade, criação de método que define o usuário
    public function getNome() {}
}

class UsuariooDb {      // 2º responsabilidade, criação de outra classe para a manipulação de banco de dados
    public function add(Usuario $u) {}
    public function updadate(Usuario $u) {}
    public function delete($id) {}
}