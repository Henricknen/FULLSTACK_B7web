<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function index(Request $request) {
        if(Auth::check()) {     // verificando se usuário está logado ultilizando 'Auth::check()'
            return redirect()-> route('home');      // se estiver logado será redireçionado para página 'home'
        }
        return view('login');
    }

    public function login_action(Request $request) {
        $validator = $request-> validate([      // validando a requisição
            'email' => 'required|email',   
            'password' => 'required|min:6',
        ]);
        
        if (Auth::attempt($validator)) {        // 'attempt' criptografa a senha e compara com o 'hash'
            return redirect()->route('home');      // apartir do 'login' o usuário será redireçionado para 'home'
        };
    }
    
    public function register(Request $request) {
        $isLoggedIn = Auth::User();       // pegando os dados do usuário ultilizando 'Auth::User()' e armazendo na variável '$isLoggedIn'
        if($isLoggedIn) {     // verificando se usuário está logado
            return redirect()-> route('home');
        }
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

    public function logout() {
        Auth()->logout();         // deslogando o usuário do sistema
        return redirect()-> route('login');
    }
}