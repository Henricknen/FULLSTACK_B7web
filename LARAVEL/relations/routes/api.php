<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']);       // rota do tipo 'get' que irá listar os usuários e os endereços

Route::get('/users/{id}', [UserController::class, 'findOne']);      // rota que buscará um usuário espeçifico

Route::post('/users', [UserController::class, 'insert']);

Route::get('/addresses', [AddressController::class, 'index']);     // lista os endereços cadastrado

Route::get('/addresses/{id}', [AddressController::class, 'findOne']);       // busca um endereço espeçifico pelo 'id'

Route::post('/addresses', [AddressesController::class, 'insert']);
