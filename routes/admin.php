<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SpecialityController;



Route::get('/', [HomeController::class,'index'])->name('admin.index');

Route::resource('specialities', SpecialityController::class)->names('admin.specialities');
Route::resource('doctors', SpecialityController::class)->names('admin.doctors'); // editar, ver, eliminar
Route::resource('schedules', SpecialityController::class)->names('admin.schedules'); // ver 
Route::resource('users', SpecialityController::class)->names('admin.users'); // ver 

