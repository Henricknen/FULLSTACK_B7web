<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use Authorizable;

    protected $redirectTo = '/painel';

    public function __construct()     {
        $this->middleware('guest')-> except('logout');
    }

    public function index()     {
        return view('admin.login');
    }

    public function authenticate() {
        
    }
}
