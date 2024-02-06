<?php 
class Moto {       // -------------------------------------- Técnica depreçiada --------------------

    function Moto() {      // anteriormente o método com o mesmo nome da classe era considerado como 'construtor'

        echo "Está função virava o construtor desta classe, mas está tecnica foi depreçiada";
    }
}

$carro = new Moto();       // instânciando a classe Moto

// ------------------------------------------------------------ Nova técnica ------------------------

class Moto2 {

    function __construct() {      // para criar o construtor se ultiliza '__construct'

        echo "Nova forma de definir o construtor ultilizando __construct <br>";
    }
}

$carro = new Moto2();

// ----------------------------------------------------------- Técnica depreçiada -------------------

class Carro {

    function acelera() {        // uso de funções não estaticas de forma estática
        echo "Vrumm";
    }

}

Carro::acelera();     // executando o método acelerar de forma estática 'sem' precisar instanciar a classe

// ------------------------------------------------------------ Nova técnica ------------------------

class Carro2 {

    public static function acelerar() {        // ultilizar 'public static' transforma a função em uma função estática
        echo "Vrumm";
    }

}

Carro2::acelerar();

// ----------------------------------------------------------- Técnica depreçiada -------------------

mysql_connect("localhost", "root", "root")      // todas funções que preçedem 'mysql' foram depreçiadas

mysql_select_db("banco");

mysql_query("SELECT");

mysql_num_rows();

mysql_fetch_assoc();

// ------------------------------------------------------------ Nova técnica ------------------------

MySQLi();

PDO();