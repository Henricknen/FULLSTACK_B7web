<?php
class Matematica {

    public static string $nome = 'Luis Henrique Silva Ferreira - ';        // propriedade 

    public static function somar($x, $y) {        // função dentro de 'classe' se transforma em método, 'static' transforma método 'somar' em estático
        return $x + $y;
    }
}

echo Matematica:: $nome;        // '::' permite acessar a propriedade '$nome' que esta dentro da classe referenciada anteriormente chamada 'Matematica'
echo Matematica:: somar(35, 65);     // 'somar' sendo uma função/metodo 'estatica' é possível ultiliza-la sem preciasr criar um objeto