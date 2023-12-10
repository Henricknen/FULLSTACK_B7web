<?php

function is_valido($cache) {
    $ultima_modificacao = filectime($cache);        // data da última modificação do cache
    $c = time() - $ultima_modificacao;      // data atual 'time' menos tempo da última modificação

    if($c > 10) {       // se o cache '$c' tiver mais de 10 segundos de vida
        return false;
    } else {
        return true;
    }
}

$p = 'pagina';
if(isset($_GET['p']) && !empty($_GET['p']) && file_exists('paginas/'. $_GET['p']. '.php')) {    // se foi enviado o arquivo 'p' se ele não estiver vazio e se o arquivo da página existir  
    $p = $_GET['p'];
}

if(file_exists('caches/'. $p. '.cache') && is_valido('caches/'. $p. '.cache')) {       // dentro da pasta 'caches' terá o nome '$p' da página '.cache' e 'is_valido' verifica se o cahe é válido
require 'caches/'. $p. '.cache';      // puchando o arquivo cache existente'
} else {

    ob_start();     // tudo o que estiver dentro de 'ob_start' e 'ob_end_clean' não será guardado na memória e não será visível para o usuário
    require 'paginas/'. $p. '.php';
    $html = ob_get_contents();      // 'ob_get_contents' pega o conteúdo e salva na variável '$html'
    ob_end_clean();

    file_put_contents('caches/'. $p. '.cache', $html);        // se a verificação 'if' não encontar o arquivo 'cache.cache'  será criado um, como html do processamento do 'ob_start'
    echo $html;

}
?>