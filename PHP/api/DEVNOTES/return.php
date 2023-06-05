<?php
header("Access-Control-Allow-Origin: *");        // alterando o 'header' para dar permissão a requisição a 'api'
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");     // dando permissão a estas requisições
header("Content-type: application/json");       // 'header' indica que o retorno sempre será um 'json'

echo json_encode($array);     // função 'json_encode' transforma o array em json
exit;