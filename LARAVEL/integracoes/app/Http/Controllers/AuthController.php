<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facaddes\Auth;

use App\Models\User;
use App\Models\Unit;
use PhpParser\Node\Stmt\Return_;

class AuthController extends Controller {
    public function unauthorized() {
        return response()-> json([
            'error'=> 'Não autorizado'
        ], 401);
    }

    public function  register(Request $request) {
        $array = ['error'=> ''];
        
        $validator = Validator::make($request-> all(), [        // regrasa de validação
            'name'=> 'required',
            'email'=> 'required|email|unique:users, email',
            'cpf'=> 'required|digits:11|unique:users, cpf',
            'password'=> 'required',
            'password_confirm'=> 'required|same:password'
        ]);

        if(!$validator-> fails()) {     // verificando se não teve nenhuma falha e pegando os campos para gerar o usuário
            $name  = $request-> input('name');
            $email  = $request-> input('email');
            $cpf  = $request-> input('cpf');
            $password  = $request-> input('password');

            $hash = password_hash($password, PASSWORD_DEFAULT);     // gerando o 'hash' da senha

            $newUser = new User();      // criando o usuário e preenchendo os campos
            $newUser-> name = $name;
            $newUser-> email = $email;
            $newUser-> cpf = $cpf;
            $newUser-> password = $hash;
            $newUser-> save();

            $token = auth()-> attempt([     // gerando 'token'
                'cpf'=> $cpf,
                'password'=> $password
            ]);

            if(!$token) {
                $array['error'] = "Ocorreu um erro";
                return $array;
            }

            $array['token'] = $token;

            $user = auth()-> user();
            $array['user'] = $user;

            $properties = Unit::select(['id', 'name'])         // pegando as propridade 'id' e 'name'
            -> where('id_owner', $user['id'])
            -> get();

            $array['user']['properties'] = $properties;

        } else {
            $array['error'] = $validator-> errors()-> first();      // pegando o primeiro erro e inserindo dentro do array 'error'
            return $array;
        }

        return $array;
    }

    public function login(Request $request) {
        $array = ['error'=> ''];

        $validator = Validator::make($request-> all(), [
            'cpf'=> 'required|digits:11',
            'password'=> 'required'
        ]);

        if($validator-> fails()) {
            $cpf = $request-> input('cpf');
            $password = $request-> input('password');

            $token = auth()-> attempt([     // gerando 'token'
                'cpf'=> $cpf,
                'password'=> $password
            ]);

            if(!$token) {
                $array['error'] = "Cpf e/ou Senha incorretos...";
                return $array;
            }

            $array['token'] = $token;

            $user = auth()-> user();
            $array['user'] = $user;

            $properties = Unit::select(['id', 'name'])         // pegando as propridade 'id' e 'name'
            -> where('id_owner', $user['id'])
            -> get();

            $array['user']['properties'] = $properties;
        } else {
            $array['error'] = $validator-> errors()-> first();
            return $array;
        }

        return $array;
    }

    public function validateToken(Request $request) {
        $array = ['error'=> ''];
        
        $user = auth()-> user();
        $array['user'] = $user;

        $properties = Unit::select(['id', 'name'])
        -> where('id_owner', $user['id'])
        -> get();

        $array['user']['properties'] = $properties;

        return $array;
    }

    public function logout() {
        $array = ['error'=> ''];

        auth()-> logout();

        return $array;
    }
}
