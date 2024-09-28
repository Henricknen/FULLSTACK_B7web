<?php

/**
* Retorna um texto apresentando o dia da semana (de 1 - Seg a 7 - Dom) 
*
* @param int Dia da semana (1 - 7)
*
* @return string Dia da semana em texto
* */


function dia_da_semana(int $dia): string {
    if($dia == 1) {
        return 'Segunda';
    } else if($dia == 2) {
        return 'Terça';
    } else if($dia == 3) {
        return 'Quarta';
    } else if($dia == 4) {
        return 'Quinta';
    } else if($dia == 5) {
        return 'Sexta';
    } else if($dia == 6) {
        return 'Sábado';
    } else if($dia == 7) {
        return 'Domingo';
    } else {
        return 'Dia inválido';
    }
}

echo 'O dia da semana é: '. dia_da_semana(1);       // echo apresenta na tela a função que está sendo chamada com o dia 1

function dia_semana_switch(int $dia): string {
    switch($dia) {
        case 1:
            return 'Segunda-feira';
            break;
        case 2:
            return 'Terça-feira';
            break;
        case 3:
            return 'Quarta-feira';
            break;
        case 4:
            return 'Quinta-feira';
            break;
        case 5:
            return 'Sexta-feira';
            break;
        case 6:
            return 'Sábado';
            break;
        case 7:
            return 'Domingo';
            break;
        default:
            return 'Dia inválido';
    }
}

echo '<br>O dia da semana é: '. dia_semana_switch(2);