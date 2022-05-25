<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::get('turno',[\App\Http\Controllers\TurnoController::class,'index'])->name('turno');
Route::get('new/paciente',[\App\Http\Controllers\TurnoController::class,'newPaciente'])->name('turno.newPaciente');
Route::get('create',[\App\Http\Controllers\TurnoController::class,'create'])->name('turno.create');
Route::post('store',[\App\Http\Controllers\TurnoController::class,'store'])->name('turno.store');
Route::get('get/horarios',[\App\Http\Controllers\HorarioController::class,'index'])->name('horarios');