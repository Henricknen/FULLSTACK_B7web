<?php

use App\Http\Controllers\ComponenteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ComponenteController:: class, 'index']);       // '/' define rota prinçipal do site e passando o 'controller' e o 'método' como parâmetro
