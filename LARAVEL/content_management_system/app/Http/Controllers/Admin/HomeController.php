<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller {

    public function __construct() {
        $this-> mmiddleware('auth');
    }
    
    public function index() {
        return view('admin.home');      // retornando a 'home' do adimistrador
    }
}
