<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {      // rota 'login'
    return view('login');
});
