<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index(Request $request) {       // método index que retornará a view 'home'
        return view('home');
    }
}