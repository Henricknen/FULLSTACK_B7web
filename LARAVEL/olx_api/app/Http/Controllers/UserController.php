<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function signup(CreateUserRequest $request): JsonResponse {      // ultilizando a request 'CreateUserRequest'

        $data = $request-> only(['name', 'email', 'password', 'state_id']);     // registrando o usuário no banco de dados
        $user = User::create($data);
        return response()-> json($user);

        // return response()-> json(['method'=> 'signup']);
    }
    
    public function signin(): JsonResponse {
        return response()-> json(['method'=> 'signin']);
    }
    
    public function me(): JsonResponse {
        return response()-> json(['method'=> 'me']);        // 'me' retorna dados sobre o usuário
    }
}
