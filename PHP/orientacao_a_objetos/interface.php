<?php
interface Database {        // interface 'Database' é um guia para ser implementado nas classes que irá ultiliza - la
    public function listarProdutos();       // indicando que 'listarProdutos' existe
    public function adicionarProdutos();        // indicando que 'adicionarProdutos' existe
    public function alterarProdutos();              // indicando que 'alterarProdutos' existe
}

class MySqlDB implements Database {     // classe 'MySqlDB' com métodos que irão manipular o banco de dados, 'implements' implementa a 'interface' Database

    public function listarProdutos() {      // método 'listarProdutos'

    }

    public function adicionarProdutos() {      // método 'adicionarProdutos'
        echo "Adiçionando com MySql";
    }

    public function alterarProdutos() {      // método 'alterarProdutos'

    }
}

class OracleDB implements Database {

    public function listarProdutos() {      // repetição do método 'listarProdutos'

    }

    public function adicionarProdutos() {      // repetição do método 'adicionarProdutos'
        echo "Adiçionando com Oracle";
    }

    public function alterarProdutos() {      // repetição do método 'alterarProdutos'

    }
}



$db = new OracleDB();
$db-> adicionarProdutos();      // chamando método 'adicionatProdutos'