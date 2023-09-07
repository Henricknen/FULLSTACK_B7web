<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    public function __construct()     {
        $this-> middleware('auth:api', [
            'except'=> [        // métodos que não é necessario estar logado para roda-los
                'login',
                'create',
                'unauthorized'
            ]
        ]);
    }

    public function unauthorizer() {
        return response()-> json(['error'=> 'Não autorizado'], 401);        // quando acessar um método em que não estvir autorizado será retornado este 'json'
    }

    public function login(Request $request) {
        $array = ['error'=> ''];

        $email = $request-> input('email');     // pegando 'email' que usuário mandou
        $password = $request-> input('password');     // pegando  'senha' que usuário mandou

        if($email && $password) {
            $token = auth()-> attempt([
                'email'=> $email,
                'password'=> $password,
            ]);

            if(!$token) {
                $array['error'] = 'Email e/ou senha errados...';
            }

            $array['token'] = $token;
            return $array;
        }

        $array['error'] = 'Dados não enviados...';
        return $array;
    }

    public function logout() {
        auth()-> logout();
        return ['error'=> ''];
    }

    public function refresh() {
        try {
            $token = auth()-> refresh();
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()-> json(['error' => 'Token inválido'], 401);
        }
    
        return [
            'error' => '',
            'token' => $token,
        ];
    }


    public function create(Request $request) {      // método 'create' criará o usuário
        $array = ['error'=> ''];        // array de eventuais 'erros'

        $name = $request-> input('name');       // pegando valores que serão enviados para criação do usuário
        $email = $request-> input('email');
        $password = $request-> input('password');
        $birthdate = $request-> input('birthdate');

        if($name && $email && $password && $birthdate) {
            if(strtotime($birthdate) ===  false) {      // validando a data de nasçimento
                $array['error'] = 'Data de nasçimento invalida!';
                return $array;
            }

            $emailExists = ModelsUser::where('email', $email)-> count();      // verificando a existençia do email
            if($emailExists === 0) {
                $hash = password_hash($password, PASSWORD_DEFAULT);

                $newUser = new User();
                $newUser-> name = $name;
                $newUser-> email = $email;
                $newUser-> password = $hash;
                $newUser-> birthdate = $birthdate;
                $newUser-> save();

                $token = auth()-> attempt([
                    'email' => $email,
                    'password' => $password
                ]);
                if(!$token) {       // verificando se tem 'token'
                    $array['error'] = 'Ocorreu um erro...';
                    return $array;
                }

                $array['token'] = $token;
            } else {
                $array['error'] = 'Email já cadastrado...';
                return $array;    
            }
        } else {
            $array['error'] = 'Não foi enviado todos os campos...';
            return $array;
        }

        return $array;
    }
}
