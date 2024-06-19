<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth');

Route::get('/', function () {
    return view('index');
});

Route::get('/nav', function () {
    return view('template.nav');
});