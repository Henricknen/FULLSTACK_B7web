<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']);       // rota do tipo 'get' que irá listar os usuários e os endereços

Route::get('/addresses', [AddressesController::class, 'index']);     // rota que vai lista os endereços cadastrado
    
