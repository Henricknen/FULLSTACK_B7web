<?php

namespace App\Http\Controllers;     // 'namespace' é o endereço da classe

use Illuminate\Http\Request;

class SiteController extends Controller {     // classe 'SiteController' extende a classe 'Controller'
    
    public function index() {      // método que vai reçeber esta requisição
        $framework = "Laravel";
        $ano = 2023;

        $data = [       // array de dados com chaves e valores
            'codificando_framework' => $framework,       // definindo o campo 'framework' com a variável '$framework'
            'ano' => $ano
        ];

        return view('bem_vindo', $data);        // chamando a função 'view' e passando array '$data' para ser usado na visualização
    }

    public function exit() {
        return view('sair');
    }
}
