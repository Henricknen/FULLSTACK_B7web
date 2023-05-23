<?php
interface Soma {
    public function somar($x, $y);
}

class Classe1 implements Soma {     // 'Classe1' com método 'somar' que faz uma soma das variáveis '$x' e '$y' implementando interfaçe 'Soma'
    public function somar($x, $y) {
        return $x + $y;     // retorna o resultado da soma
    }
}

class Classe2 implements Soma {     // 'Classe2' faz a mesma soma de outra maneira
    public function somar($x, $y) {
        $res = $x;
        for($q = 0; $q < $y; $q++) {
            $res++;
        }
        return $res;     // retorna o resultado da soma
    }
}

class Matematica {      // classe 'Matematica' reçeberá as outras classes para fazer as coisas espeçificas
    private $classe;        // local que será armazenada a 'Classe'

    public function __construct(Soma $c) {        // variável '$c' representa a 'Classe1' e ultilizaráa interfaçe 'Soma'
        $this->classe = $c;
    }

    public function somar($x, $y) {
        return $this->classe->somar($x, $y);      // ultilizando classe para fazer a soma
    }
}

$mat = new Matematica(new Classe1());       // Instancia a classe Matematica passando uma instância da classe Classe1 como parâmetro
echo $mat->somar(20, 8);        // Chama o método somar() da instância de Matematica para realizar a soma (resultado: 28)







// class Database {        // classe 'Database' manipula banco de dados
//     private $engine;        // '$engine'é um 'motor' que a classe irá ultilizar

//     public function __construct(DatabaseInterface $eng) {        // construct ultilizando interfaçe 'DatabaseInterface'
//         $this-> engine-> $eng;
//     }

//     public function listarTudo() {
//         return $this-> engine-> listar();
//     }
// }

// class MysqlEngine implements DatabaseInterface {
//     public function listar() {
                // .....
//     }
// }

// class OracleEngine implements DatabaseInterface {
//     public function listar() {
            // .....
//     }
// }

// class MongoEngine implements DatabaseInterface {
//     public function listar() {
            // .....
//     }
// }

// $db = new Database(new MysqlEngine() );     // fazendo uma injeção de depedênçia, ultilizando a engine 'MysqlEngine'
// $db-> listarTudo();     // lista todos os dados que estiver no banco de dados 'MysqlEngine'