<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Controllers\AuthController;
use App\Controllers\BilletController;
use App\Controllers\DocController;
use App\Controllers\FoundAndLostController;
use App\Controllers\ReservationController;
use App\Controllers\UnitController;
use App\Controllers\UserController;
use App\Controllers\WallController;
use App\Controllers\WarningController;

Route::get('/ping', function() {
    return ['pong'=> true];
});