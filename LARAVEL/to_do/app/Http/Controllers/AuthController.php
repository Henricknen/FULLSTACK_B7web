<?php


namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller {
    public function index(Request $request) {
        return view('login');
    }

    public function register(Request $request) {
        return view('register');
    }

    public function register_action(Request $request) {

        $data = $request-> only('name', 'email', 'password');
        $userCreated = User::create($data);
        dd($userCreated);
    }
}