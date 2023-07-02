<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController:: class, 'index']);       // passando o 'controller' e o 'método' como parâmetro

// Route::get('/', function () {       // rota prinçipal do site
//     return 'Router';
//     // return view('nova_view');
// });
