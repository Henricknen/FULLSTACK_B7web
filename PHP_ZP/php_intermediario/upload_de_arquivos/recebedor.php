<?php

$arquivo = $_FILES['arquivo'];      // para reçecer arquivos se usa 'FILES'

if(isset($arquivo['tmp_name']) && empty($arquivo['tmp_name']) == false) {        // verificando foi reçebido um arquivo

    $nomedoarquivo =md5(time(). rand(0, 99)). '.png';       // gerando um 'nomedoarquivo' aleatório
    move_uploaded_file($arquivo['tmp_name'], 'arquivos/'. $nomedoarquivo);       // função 'move_uploaded_file' reçebe dois parametro, o primeiro é o arquivo temporario e o segundo é o destino que vai ser salvo o aqruivo

    echo "Arquivo enviado com sucesso...";

}

?>