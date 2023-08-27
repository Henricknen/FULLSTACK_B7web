<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function index(Request $request) {
        return view('login');
    }

    public function login_action(Request $request) {
        $validator = $request-> validate([      // validando a requisição
            'email' => 'required|email',   
            'password' => 'required|min:6',
        ]);
        dd($validator);
    }

    public function register(Request $request) {
        return view('register');
    }

    public function register_action(Request $request) {

        $request-> validate([       // 'validate' com um array de regras
            'name' => 'required',       // o usúario tem que ter um nome
            'email' => 'required|email|unique:users',       // o email tem que ser único na tabel 'users'
            'password' => 'required|min:6|confirmed',       // 'password' tem que ter no minimo 6 caracters |'confirmed' busca pela confirmação da senha
        ]);

        $data = $request-> only('name', 'email', 'password');       // pegando 'name', 'email', 'password'
        
        $data['password'] = Hash::make($data['password']); // passando para 'Hash::make' o password antes dele ser criptografado

        $userCreated = User::create($data);
        
        return redirect(route('login'));        // depois de registrado será feito 'login'
    }
}