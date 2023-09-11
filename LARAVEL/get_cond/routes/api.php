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
        // rotas de autenticação
Route::get('/401', [AuthController::class, 'unauthorized'])-> name('login');

Route::post('/auth/login', [AuthController::class, 'login']);        // rota de 'login' permite acesso mesmo não estando logado
Route::post('/auth/register', [AuthController::class, 'register']);    // rota de 'cadastro' permite acesso mesmo não estando logado

Route::middleware('auth:api')-> group(function() {      // para ter açesso a estas rotas é necessário estar logado
    Route::post('/auth/validate', [AuthController::class, 'validateToken']);
    Route::post('/auth/logout', [AuthController::class, 'logout']);

        // rotas do mural de avisos
    Route::get('/walls', [WallController::class, 'getAll']);
    Route::post('/wall/{id}/like', [WallController::class, 'like']);
    
        // rota do documentos
    Route::get('/doc', [DocController::class, 'getAll']);
    
        // rotas do livro de ocorrençias
    Route::get('/warnings', [WarningController::class, 'getMyWarnings']);
    Route::post('/warning', [WarningController::class, 'setWarnings']);
    Route::post('/warning/file', [WarningController::class, 'addWarningFile']);

        // rota dos boletos
    Route::get('/billet', [BilletController::class, 'getAll']);

        // rotas de açhados e perdidos
    Route::get('/foundandlost', [FoundAndLostController::class, 'getAll']);
    Route::post('/foundandlost', [FoundAndLostController::class, 'insert']);
    Route::put('/foundandlost/{id}', [FoundAndLostController::class, 'update']);

        // rotas da unidades
    Route::get('/unit/{id}', [UnitController::class, 'getInfo']);
    Route::post('/unit/{id}/addperson', [UnitController::class, 'addPerson']);
    Route::post('/unit/{id}/addvehicle', [UnitController::class, 'addVehicle']);
    Route::post('/unit/{id}/addpet', [UnitController::class, 'addPet']);
    Route::post('/unit/{id}/removeperson', [UnitController::class, 'removePerson']);
    Route::post('/unit/{id}/removevehicle', [UnitController::class, 'removeVehicle']);
    Route::post('/unit/{id}/removepet', [UnitController::class, 'removePet']);

        // rotas de reservas
    Route::get('/reservations', [ReservationController::class, 'getReservations']);
    Route::post('/reservation/{id}', [ReservationController::class, 'setReservation']);

    Route::get('/reservation/{id}/disableddates', [ReservationController::class, 'getDisabledDates']);
    Route::get('/reservation/{id}/times', [ReservationController::class, 'getTimes']);

    Route::get('/myreservations', [ReservationController::class, 'getMyReservations']);
    Route::delete('/myreservation/{id}', [ReservationController::class, 'delMyReservation']);
    
    });