<?php

define('IDADE_APOSENTADORIA_MASCULINA', 65);       // definição de constante
define('IDADE_APOSENTADORIA_FEMININA', 62);

/** 
* Calcula a quantidade de anos para aposentadoria
*
* @param int $idade
* @param string $sexo
*
* @return int quantidade de anos que falta
*/

function falta_p_aposentadoria(int $idade, string $sexo) {      // função calculará os anos que faltam para a aposentadoria
    $anos_necessarios_para_aposentadoria = ($sexo === 'M') ? IDADE_APOSENTADORIA_MASCULINA : IDADE_APOSENTADORIA_FEMININA;
    return $anos_necessarios_para_aposentadoria - $idade;
}

$idade = 60;        // definindo idade atual
$sexo = 'M';        // definindo sexo
$faltam = falta_p_aposentadoria($idade, $sexo);
echo "Faltam $faltam anos para a aposentadoria.";
