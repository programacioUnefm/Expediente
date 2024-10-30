<?php

use App\Http\Controllers\api\EstadosController;
use App\Http\Controllers\api\NivelProfesionalController;
use App\Http\Controllers\api\PaisesController;
use Illuminate\Support\Facades\Route;


Route::middleware(['verify.token'])->group(function () {
  Route::get('api/paises',[PaisesController::class,'index']);
  Route::post('api/paises',[PaisesController::class,'store']);
  Route::put('api/paises/{id}', [PaisesController::class, 'update']);
  Route::delete('api/paises/{id}', [PaisesController::class, 'destroy']);
});


Route::middleware(['verify.token'])->group(function () {
  Route::get('api/nivelprofesional',[NivelProfesionalController::class,'index']);
  Route::post('api/nivelprofesional',[NivelProfesionalController::class,'store']);
  Route::put('api/nivelprofesional/{id}', [NivelProfesionalController::class, 'update']);
  Route::delete('api/nivelprofesional/{id}', [NivelProfesionalController::class, 'destroy']);
});


Route::middleware(['verify.token'])->group(function () {
  Route::get('api/estados',[EstadosController::class,'index']);
  Route::post('api/estados',[EstadosController::class,'store']);
  Route::put('api/estados/{id}', [EstadosController::class, 'update']);
  Route::delete('api/estados/{id}', [EstadosController::class, 'destroy']);
});