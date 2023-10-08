<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller {
    
    public function register() {
        return view('auth.register');       // retornando a 'view'
    }

    public function register_action(RegisterRequest $request) {
        echo 'Request ocorreu ccrretamente';
        dd($request);

    }
}
