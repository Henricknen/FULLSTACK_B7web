<?php

namespace App\Http\Controllers;     // 'namespace' é o endereço da classe

class Laco_de_repeticaoController  extends Controller {     // classe 'SiteController' extende a classe 'Controller'
    
    public function index() {      // método que vai reçeber esta requisição
        
        $array = [       // array de dados com chaves e valores
            'ingredientes' => [     // array de 'ingredientes'
                'farinha',
                'ovo',
                'leite condensado',
                'fermento em pó'
            ]
        ];

        return view('laco_de_repeticao', $array);        // chamando a função 'view' e passando 'array' para ser usado na visualização
    }

}