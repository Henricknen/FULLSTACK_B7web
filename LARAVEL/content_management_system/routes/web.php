<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'Site\HomeController@index');       // parte frontal do sistema

Route::prefix('painel')-> group (function () {       // parte traseira do sistema
    Route::get('/', 'Admin\HomeController@index');      // referençiando a primeira página do painel
});
