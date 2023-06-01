<?php
$date = new DateTime();     // definição da classe 'DateTime' que pega a data atual

echo $date-> format('d/m/Y'). "<br>";       // ultilizando 'format' para formatar e exibir na tela


$datee = new DateTime('31-05-2023 18:20:00');
$datee-> setTimezone(new DateTimeZone('America/Sao_Paulo'));        // alterando o 'DateTimeZone' da data

echo $datee-> format('d/m/Y H:i:s'). "<br>";


$dateee = new DateTime('31-05-2023 18:20:00');
$dateee-> add(DateInterval :: createFromDateString(' 5 years 2 days 5 minute 26 seconds'));        // ultilizando 'add' para adiçionar um intervalo de tempo espeçifico
$dateee-> sub(DateInterval :: createFromDateString(' 3 years 2 days 5 minute 26 seconds'));     // 'sub' diminui

echo $dateee-> format('d/m/Y H:i:s'). "<br>";


if($datee > $dateee) {      // comparando datas
    echo "Datee é maior que Dateee  <br>";
} else {
    echo "Dateee é maior que Datee  <br>";
}

$diff = $datee-> diff($dateee);     // função 'diff' calcula a diferença entre as datas
echo $diff-> format('%a de diferença de Datee para Dateee');      // '%a' mostra a quantidade de dias de diferença