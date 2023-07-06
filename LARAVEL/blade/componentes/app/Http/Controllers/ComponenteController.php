<?php

namespace App\Http\Controllers;     // 'namespace' é o endereço da classe

class ComponenteController  extends Controller {     // classe 'ComponenteController' extende a classe 'Controller'
    
    public function index() {      // método que vai reçeber esta requisição
        
        $array = [       // array de dados com chaves e valores
            'ingredientes' => [     // array de 'ingredientes'
                'farinha',
                'ovo',
                'leite condensado',
                'fermento em pó'
            ]
        ];

        return view('componentes', $array);        // chamando a função 'view' e passando 'array' para ser usado na visualização
    }

}