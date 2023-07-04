<?php

use App\Http\Controllers\Laco_de_repeticaoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [Laco_de_repeticaoController:: class, 'index']);       // '/' define rota prinçipal do site e passando o 'controller' e o 'método' como parâmetro
