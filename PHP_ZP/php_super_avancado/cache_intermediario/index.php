<?php

if(file_exists('cache.cache')) {
require 'cache.cache';      // puchando o arquivo cache existente'
} else {

    ob_start();     // tudo o que estiver dentro de 'ob_start' e 'ob_end_clean' não será guardado na memória e não será visível para o usuário
    require 'pagina.php';
    $html = ob_get_contents();      // 'ob_get_contents' pega o conteúdo e salva na variável '$html'
    ob_end_clean();

    file_put_contents('cache.cache', $html);        // se a verificação 'if' não encontar o arquivo 'cache.cache'  será criado um, como html do processamento do 'ob_start'
    echo $html;

}
?>