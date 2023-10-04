<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function signup(): JsonResponse {
        return response()-> json(['method'=> 'signup']);
    }
    
    public function signin(): JsonResponse {
        return response()-> json(['method'=> 'signin']);
    }
    
    public function me(): JsonResponse {
        return response()-> json(['method'=> 'me']);        // 'me' retorna dados sobre o usuário
    }
}
