<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function index(Request $request) {
        // dd(Auth::user());       // método para acessar o usuário logado
        return view('login');
    }

    public function login_action(Request $request) {
        $validator = $request-> validate([      // validando a requisição
            'email' => 'required|email',   
            'password' => 'required|min:6',
        ]);
        
        if (Auth::attempt($validator)) {        // 'attempt' criptografa a senha e compara com o 'hash'
            return redirect()-> route('home');      // apartir do 'login' o usuário será redireçionado para 'home'
        };
    }
    
    public function register(Request $request) {
        return view('register');
    }
    
    public function register_action(Request $request) {

        $request-> validate([       // 'validate' com um array de regras
            'name' => 'required',
            'email' => 'required|email|unique:users',   
            'password' => 'required|min:6|confirmed',       // 'confirmed' busca pela confirmação da senha
        ]);
        
        $data = $request-> only('name', 'email', 'password');       // pegando 'name', 'email', 'password'

        $data['password'] = Hash::make($data['password']);      // passando para 'Hash::make' o password antes dele ser criptografado

        $userCreated = User::create($data);
        
        return redirect(route('login'));        // depois de registrado será feito 'login'
    }
}
