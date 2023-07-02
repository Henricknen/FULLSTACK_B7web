<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {       // rota prinçipal do site
    return view('nova_view');
});
