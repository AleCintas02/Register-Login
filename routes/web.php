<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/register', function () {
    return view('auth.register');
});
Route::post('/enviar-registro', [RegisterController::class, 'register'])->name('form.register');
