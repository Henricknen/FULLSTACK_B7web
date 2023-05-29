<?php
class A {
    public function getNome() {
        return "Meu nome é A";
    }
}

class B extends A {     // 'extends' estende as propriedades ou métodos da classe A
    public function getNome() {
        return "Meu nome é B";
    }
}

function imprimeNome(A $obj) {      // função 'imprimeNome' reçebendo uma injeção de dependência 'A $obj'
    return $obj-> getNome();
}

$objeto1 = new A();     // instançiando 'objeto1' 
$objeto2 = new B();
echo imprimeNome($objeto1). "<br>";
echo imprimeNome($objeto2);     // chamando função 'imprimeNome' mandando objeto2 'B'