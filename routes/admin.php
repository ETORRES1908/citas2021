<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;

Route::get('/', [HomeController::class,'index'])->middleware('can:admin.index')->name('admin.index');


Route::resource('specialities', SpecialityController::class)->names('admin.specialities');// editar, ver, eliminar
Route::resource('doctors', DoctorController::class)->names('admin.doctors'); // editar, ver, eliminar
Route::resource('users', UserController::class)->names('admin.users'); // ver usuarios

Route::resource('roles', RoleController::class)->names('admin.roles'); // gestionar los roles



