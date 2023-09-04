<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller {
    private $loggedUser;

    public function __construct() {
        $this-> middleware('auth:api');

        $this-> loggedUser = auth()-> user();
    }
}
