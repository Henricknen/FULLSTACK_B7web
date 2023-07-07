<?php

namespace App\Http\Controllers;     // 'namespace' é o endereço da classe

class SiteController  extends Controller {     // classe 'SiteController' extende a classe 'Controller'
    
    public function index() {
        return view('include');
    }
}