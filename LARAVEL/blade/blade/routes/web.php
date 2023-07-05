<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController:: class, 'index']);       // '/' define rota prinçipal do site e passando o 'controller' e o 'método' como parâmetro
