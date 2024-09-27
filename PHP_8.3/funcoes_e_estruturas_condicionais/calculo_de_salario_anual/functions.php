<?php

/**
 * Calcula salario Anual baseado no salario mensal
 * *
 * @param float $salarioMensal
 * *
 * @return float $salarioAnual
 */

 function calcular_salario_anual(float $salario_mensal): string {     // função para calcular o sálio anual
    $terco_de_ferias = $salario_mensal / 3;
    $salario_anual = ($salario_mensal * 13) + $terco_de_ferias;

    return convertNumberToBRL($salario_anual);
 }

/**
 * Recebe um valor numerico e retorna um valor monetario
 * *
 * @param $number valor numerico
 * *
 * @return string valor monetario 
 */

 function  convertNumberToBRL(float $number): string {
   return number_format($number, 2, ',', '.');
 }
