<?php

if(isset($_GET['campanha'])) {      // 'isset' verifica se a variável foi 'setada' exite ou não existe
    $numero_campanha = $_GET['campanha'];
    echo "Você veio pela campanha ". $numero_campanha;
} else {
    echo "Variável não definida";
}