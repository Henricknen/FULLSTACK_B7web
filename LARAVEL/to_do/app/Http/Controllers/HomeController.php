<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class HomeController extends Controller {
    public function index(Request $request) {       // método index que retornará a view 'home'

        $tasks = Task::all()->take(3);        // seleçionando 3 'tasks'
        
        return view('home', ['tasks' => $tasks]);        // passando as 'tasks' pra view
    }
}
