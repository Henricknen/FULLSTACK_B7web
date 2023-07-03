<?php

namespace App\Http\Controllers;     // 'namespace' é o endereço da classe

use Illuminate\Http\Request;

class SiteController extends Controller {     // classe 'SiteController' extende a classe 'Controller'
    
    public function index() {      // método que vai reçeber esta requisição
    //     $framework = "Laravel";
    //     return 'Luis Henrique Silva Ferreira está codificando: '. $framework;
        return view('nova_view');       // retornando 'view'
    }

    public function exit() {
        return view('sair');
    }
}
