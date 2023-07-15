<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    //
    public function index(Request $r) {     // método index listará todos os usuários
        $users = User::all();
        return $users;
    }

    public function findOne(Request $r) {       // método 'findOne'
        $user = User::find($r-> id);
        return $user;
    }
}
