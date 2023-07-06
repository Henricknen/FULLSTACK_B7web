<?php

use App\Http\Controllers\CondicionalController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CondicionalController:: class, 'index']);       // '/' define rota prinçipal do site e passando o 'controller' e o 'método' como parâmetro
