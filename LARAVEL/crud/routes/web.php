<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/post/create', [PostController::class, 'create']);

Route::get('/post/read', [PostController::class, 'read']);

Route::get('/post/all', [PostController::class, 'all']);

Route::get('/', function () {
    return view('welcome');
});
