<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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
    
    public function signin(): JsonResponse {
        return response()-> json(['method'=> 'signin']);
    }
    
    public function me(): JsonResponse {
        return response()-> json(['method'=> 'me']);        // 'me' retorna dados sobre o usuário
    }
}
