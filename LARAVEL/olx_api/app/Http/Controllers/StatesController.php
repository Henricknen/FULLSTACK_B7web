<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StatesController extends Controller {
    public function index(Request $r): JsonResponse {       // método fará uma listagem geral dos estados com resposta do tipo 'JsonResponse'
        $states = State::all();      // pegando todo os estados cadastrados
        return response()-> json(['data'=> $states]);
    }
}
