<?php 
if (Lorem, ipsum r sit amet consectetur adipisicing elit. Nobis inventore aspgfh     // cada linha de ter no maxímo 80 caracteres
    consectetur adipisicing) {

}

namespace AlgumNameSpace;
                            // linha em braco 
Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero ullam eaque fugit rem ad ipsam voluptates

use AlgumUse;
                            // linha em braco
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Obcaecati earum, consectetur quae sequi iure 

class Classe
{       // abertura e fechamento na linha de baixo

    private $name;      // visibilidade da propriedade declarada como 'private'

    public function funcao($parametro, $semespaco)        // visibilidade do método sendo declarada como 'public', os parâmetros não deve ter espaços no iniçio e no final
    {       // abertura e fechamento na linha de baixo

        if ($this-> name == "Luis Henrique Silva Ferreira") {     // logo depois do 'if, elseif, else, while, switch' deve deixar um espaço e abertura sendo feita na mesma linha
            $this-> profissional();
        }

    }
}



// 1. O código deve seguir a PSR-1 
// 2. O código deve usar identação de 4 espaços, 'enão' tabs
// 3. Cada linha deve ter 80 caracteres ou menos
// 4. Após a declaração do 'namespace' ou 'use', deve de deixar uma linha em branco
// 5. Abertura e fechamento das classes devem ser feitas na próxima linha
// 6. Abertura e fechamento dos métodos devem ser feitas na próxima linha
// 7. A visibilidade deve ser declarada em todas as propriedades e métodos de uma classe
// 8. Condiçionais devem ter espaços entre elas, mas no caso de funções/métodos não
// 9. A abertura das condiçionais devem ser feitas na mesma linha. O fechamento na próxima
// 10. Os parâmetros de funções/métodos não devem ter espaço no iniçio e no fim