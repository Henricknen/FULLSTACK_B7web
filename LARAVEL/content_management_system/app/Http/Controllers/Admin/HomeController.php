<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function __construct() {
        // $this-> mmiddleware('auth');     // exigençia do 'login'
    }
    
    public function index() {
        return view('admin.home');      // retornando a 'home' do adimistrador
    }
}
