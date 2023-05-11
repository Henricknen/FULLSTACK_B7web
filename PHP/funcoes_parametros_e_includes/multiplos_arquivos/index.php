<?php

require('config.php');          // função 'require' importará os arquivos de 'config.php', com 'require' se o arquivo não existir a execução do programa é impedida

require_once('header.php');         // função 'require_once' puxará o arquivo de cabeçalho apenas uma vez
require_once('header.php');


// include('nao_exite.php');                // 'include' se o arquivo não exitir a execução do programa não é impedida mas apresenta o erro na tela


echo 'Conteudo do Site...'. "<br>";

echo "Nome do Usuario: ". $usuario;