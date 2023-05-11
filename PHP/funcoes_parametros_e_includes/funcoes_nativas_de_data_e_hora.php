<?php
echo date('d-m-Y H: i: s'). "<hr>";     // ultilizando função 'date' com parâmetros que define a data e a hora atual

$data = '2023-05-07';
echo date('d/m/Y', strtotime($data));       // 'strtotime' transforma 'string' em 'time'
