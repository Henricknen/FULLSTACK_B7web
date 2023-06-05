<?php
require('../config.php');

    $method = strtolower($_SERVER['REQUEST_METHOD']);       // variável global '$_SERVER' verifica se o método é o método correto
if($method === 'get') {     // se a requisição for do tipo 'get'

    $sql = $pdo-> query("SELECT * FROM notes");     // fazendo a requisição
    if($sql-> rowCount() > 0) {     // verificando se tem resultado
        $data = $sql-> fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $item) {      // dando um 'foreach' no resultado 
            $array['result'][] = [          // adiçionando o resultado no '$array'
                'id' => $item['id'],
                'title' => $item['title'],
            ];
        }
    }

} else {
    $array['error'] = 'Método não permitido (apenas GET)';
}

require('../return.php');