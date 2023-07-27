<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController:: class, 'index']) ->name('home');      // rota 'home'
Route::get('/task/new', [TaskController:: class, 'create']) ->name('task.create');      // rota do formulario que criará 'task'
Route::get('/task/edit', [TaskController:: class, 'create']) ->name('task.edit');
Route::get('/task', [TaskController:: class, 'create']) ->name('task.view');      // rota de exibição de 'task' espeçifica

Route::get('/login', [AuthController:: class, 'index']) ->name('login');        // na parte de autentificação será feito o 'login'
Route::get('/register', [AuthController:: class, 'register']) ->name('register');       // também na autentificação será feito o 'redgistro'
