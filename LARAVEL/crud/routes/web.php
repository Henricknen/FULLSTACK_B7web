<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/post/create', [PostController::class, 'create']);

Route::get('/', function () {
    return view('welcome');
});
