<?php

$x = time();        // 'time' retorna o 'timestamp' Unix atual

echo $x. "<br/>";

$dataproxima = date('d/m/Y', strtotime("+10 days"));      // função 'strtotime' converte uma representação textual de data e hora em um valor de data/hora Unix que é um número de segundos desde a 'Época Unix' (1 de janeiro de 1970) e ultilizando como parâmetrpo 10 dias a mais

echo $dataproxima;

?>