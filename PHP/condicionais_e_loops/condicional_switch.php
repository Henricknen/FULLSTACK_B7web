<?php
$tipo = 'Video';        // declarando variável '$tipo'

switch($tipo) {     // 'switch' permite que o progama execute difentes tipos de ações se o 'case' for igual a variável declarada
    case 'Foto':        // 'case' é uma condição do 'switch'
        echo "Exibindo Foto";
        break;
    case 'Video':
        echo "Exibindo Video";
        break;
    case 'Texto':
        echo "Exibindo Texto";
        break;
}