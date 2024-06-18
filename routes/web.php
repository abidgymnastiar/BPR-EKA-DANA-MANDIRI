<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth');

Route::get('/admin/roles', [UserController::class, 'index'])->name('roles.index');
Route::post('/admin/roles', [UserController::class, 'create_roles'])->name('roles.create');
Route::get('/', function () {
    return view('index');
});