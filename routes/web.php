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
    return view('welcome');
});

# Ruta para el registro:
Route::get('register', ['App\Http\Controllers\AccountController', 'getRegister'])->name('account.getRegister');

# Ruta para verificar la disponibilidad del email:
Route::post('verify', ['App\Http\Controllers\AccountController', 'verifyEmailAvailability'])->name('account.verifyEmailAvailability');
