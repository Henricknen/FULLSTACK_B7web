<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    public function index(Request $request) {       // método index que retornará a view 'home'

        // $tasks = Task::all()->take(4); // seleçionando 4 'tasks'
        $tasks = Task::whereDate('due_date', date('Y-m-d'))-> get(); // 'wherDate' seleçionando 'tasks' pela data atual
        $AuthUser = Auth::user();       // incluindo dados do usuário autenticado

        return view('home', ['tasks' => $tasks, 'AuthUser' => $AuthUser]);        // passando as 'tasks' e dados do usuário para view
    }
}