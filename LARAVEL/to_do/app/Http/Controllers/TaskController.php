<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller {
    public function index() {
        
    }

    public function create(Request $request)  {
        return view('tasks.create');
    }

    public function edit(Request $request)  {
        return view('tasks.edit');
    }

    public function delete(Request $request)  {     // deleta e redireçiona para a 'home'
        return redirect (route('home'));

    }
}
