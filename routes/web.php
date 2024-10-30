<?php

use App\Http\Controllers\api\EstadosController;
use App\Http\Controllers\api\MunicipiosController;
use App\Http\Controllers\api\NivelProfesionalController;
use App\Http\Controllers\api\PaisesController;
use App\Http\Controllers\api\ParroquiasController;
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

Route::middleware(['verify.token'])->group(function () {
  Route::get('api/municipios',[MunicipiosController::class,'index']);
  Route::post('api/municipios',[MunicipiosController::class,'store']);
  Route::get('api/municipios/{nData}', [MunicipiosController::class, 'results']);
  Route::put('api/municipios/{id}', [MunicipiosController::class, 'update']);
  Route::delete('api/municipios/{id}', [MunicipiosController::class, 'destroy']);
});

Route::middleware(['verify.token'])->group(function () {
  Route::get('api/parroquias',[ParroquiasController::class,'index']);
  Route::post('api/parroquias',[ParroquiasController::class,'store']);
  Route::get('api/parroquias/{nData}', [ParroquiasController::class, 'results']);
  Route::put('api/parroquias/{id}', [ParroquiasController::class, 'update']);
  Route::delete('api/parroquias/{id}', [ParroquiasController::class, 'destroy']);
});