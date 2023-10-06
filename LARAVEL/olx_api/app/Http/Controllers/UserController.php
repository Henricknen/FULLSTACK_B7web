<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\signinInRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {
    public function signup(CreateUserRequest $request): JsonResponse {      // ultilizando a request 'CreateUserRequest'

        $data = $request-> only(['name', 'email', 'password', 'state_id']);     // registrando o usuário no banco de dados
        $data['password'] = Hash::make($data['password']);      // gerando um 'hash' da senha
        $user = User::create($data);

        $response = [
            'error'=> '',
            'token'=> $user-> createToken('Register_token')-> plainTextToken        // criando o token de autenticação do usuário
        ];

        return response()-> json($response);

        // return response()-> json(['method'=> 'signup']);
    }
    


    public function signin(signinInRequest $request): JsonResponse {

        $data = $request->only(['email', 'password']);      // armazenando os dados do usuário em '$data'

        if (Auth::attempt($data)) {         // Verificando se foi feito o login
            $user = Auth::user();       // Pegando o usuário atual
            $response = [       // Correção de sintaxe: uso de =>
                'error' => '',
                'token' => $user-> createToken('Login_token')-> plainTextToken
            ];
            return response()-> json($response);     // Retornando uma resposta em JSON se o usuário conseguir fazer o login
        }
        return response()-> json(['error' => 'Usuário ou senha Inválidos...']);
    }
        
        public function me(Request $r): JsonResponse {
            $user = Auth::user();

            $response = [
                'name'=> $user-> name,
                'email'=> $user-> email,
                'state'=> $user-> state-> name,     // pegando o 'nome' do state do usuário
                'ads'=> $user-> advertises      // lista de anúnçios do usuário
            ];
        
           return response()-> json($response);     // retornando os dados do usuário logado
        }
        
    }

