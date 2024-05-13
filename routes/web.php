<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');


Route::post('/enviar-registro', [RegisterController::class, 'register'])->name('form.register');

//Route::post('/check-email', 'RegisterController@checkEmail');

Route::post('enviar-ingreso', [LoginController::class, 'login'])->name('form.login');


Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
