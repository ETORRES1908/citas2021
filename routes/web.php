<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\ScheduleController;
use App\Http\Livewire\Navigation;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\CitaController;
use App\Http\Controllers\User\VerCitaController;
use App\Http\Controllers\User\UsuController;

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
        return view('dashboard');
    })->name('wellcome.index');

    Route::get('/a',[Navigation::class,'render']);

    Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


Route::resource('reservar', CitaController::class)->names('cita.reserva'); //
Route::resource('citas', VerCitaController::class)->names('cita.ver');
Route::resource('perfil', UsuController::class)->names('usuario.perfil');

Route::resource('horarios', ScheduleController::class)->names('horarios');

