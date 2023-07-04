<?php

namespace App\Http\Controllers;     // 'namespace' é o endereço da classe

use Illuminate\Http\Request;

class SiteController extends Controller {     // classe 'SiteController' extende a classe 'Controller'
    
    public function index() {      // método que vai reçeber esta requisição
        
        $array = [       // array de dados com chaves e valores
            'codificando_framework' => 'Laravel',       // passando string 'Laravel' diretamente no array que vai para view
            'ano' => 2023,
            'html' => '<b style = "color: red">Negrito</b>'     // definindo o valor da variável 'html' com código html
        ];

        return view('bem_vindo', $array);        // chamando a função 'view' e passando 'array' para ser usado na visualização
    }

}