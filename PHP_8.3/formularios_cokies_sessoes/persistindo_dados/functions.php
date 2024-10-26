<?php

function exibirErro($erro) {        // função verifica se variável 
    if(!empty($erro) && $_SERVER['REQUEST_METHOD'] == 'POST') {
        return true;
    } else {
        return false;
    }
}

?>