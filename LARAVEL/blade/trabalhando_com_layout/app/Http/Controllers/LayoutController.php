<?php

namespace App\Http\Controllers;

class LayoutController  extends Controller {
    
    public function layout() {
        return view('site');
    }
    
}