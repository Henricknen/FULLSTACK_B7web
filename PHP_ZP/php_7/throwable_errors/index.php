<?php
try {
    
    jhjhhuhug();        // função inexistente que gerará erro

} catch(Throwable $e) {     // capturando qualquer exceção ou erro
    echo "Erro de sintaxe";     // exibe uma está menssagem espeçifica
    echo "<br>";
    echo "Erro no arquivo: ". $e-> getFile();       // mostrando o arquivo onde ocorreu o erro
    echo "<br>";
    echo "Erro na linha: ". $e-> getLine();       // mostrando a linha onde ocorreu o erro
    echo "<br>";
    echo "Erro: ". $e-> getMessage();       // mostra informação do proprio erro
    echo "<br>";
    $msg = $e-> getMessage(). ' - '. $e-> getFile(). ' - '. $e-> getLine();
    file_put_contents('erro.txt', $msg);        // salvando os detalhes do erro em um arquivo 'erro.txt'
}