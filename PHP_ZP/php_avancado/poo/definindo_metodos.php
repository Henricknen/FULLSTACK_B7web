<?php

class Usuario {

    public function trocarNome($senhaAtual, $novaSenha) {      // método 'trocarNome' com permisão de acesso 'public' que deixa o método acessivel por fora do objeto

        // Conectar ao banco de dados
        // Verificar se a senha atual está correta

    }

    private function conectarAoBanco() {        //  permissão de acesso 'private' define que esse método só pode ser acessado de dentro da própria classe

    }

    protected function algumaCoisa() {      // método com permissão de acesso 'protected' só podem ser acessados dentro da classe e nas classe que  essa classe

     }
    
}

class Cachorro {        // classe cachoro
    
    public function latir() {       // método definindo uma ação da classe

    }
}

?>