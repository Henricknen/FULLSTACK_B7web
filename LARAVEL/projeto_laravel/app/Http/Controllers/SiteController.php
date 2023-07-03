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

    public function users(Request $r) {       // parametro '$r' do tipo 'request' permite que acesse os dados da requisicao 'http' incluindo os valores enviados pelo usuario

        $data = [       // '$data' é um array associativo que armazena os dados a serao passados para a view
            'quantidade' => $r -> qnt       //  armazena o valor da quantidade fornecida pelo usuario no array '$data'
        ];
        return view('usuarios', $data);
    }
}
