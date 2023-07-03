<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController:: class, 'index']);       // '/' define rota prinçipal do site e passando o 'controller' e o 'método' como parâmetro

Route::get('/sair', [SiteController:: class, 'exit']);    // criando rota '/sair' e apontando ela para o controller 'SiteController' e para o método'exit'

Route::get('/usuarios/{qnt}', [SiteController:: class, 'users']);     // endereço '/usuarios', '/{qnt}' indica que será passado algum valor pelo usuário e método 'users'

