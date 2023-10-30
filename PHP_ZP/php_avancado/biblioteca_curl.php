<?php

$biblioteca = curl_init();      // iniçiando a biblioteca 'curl'

curl_setopt($biblioteca, CURLOPT_URL,
    "localhost/FULLSTACK_B7web/PHP_ZP/php_intermediario/calculadora/");        // url a qual vai ser feita a requisição
curl_setopt($biblioteca, CURLOPT_POST, 1);      // método de envio 'post'
curl_setopt($biblioteca, CURLOPT_POSTFIELDS,
"nome=LuisHenriqueSF&idade=32&sexo=masculino");     // campos que seão enviados

curl_setopt($biblioteca, CURLOPT_RETURNTRANSFER, true);     // dizendo para biblioteca que tem que se pegar os resultados retornado da 'url' requisitada

$resposta = curl_exec($biblioteca);     // executando a requisição
curl_close($biblioteca);

print_r($resposta);

?>