<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\PeminjamanController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('auth');

Route::get('login', function () {
    return view('components.view.login');
});

Route::get('/home', function () {
    return view('user.home');
});

Route::post('/peminjaman', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::get('/peminjaman/show/{id}', [PeminjamanController::class, 'show'])->name('peminjaman.show');
Route::delete('/peminjaman/delete/{id}', [PeminjamanController::class, 'delete'])->name('peminjaman.delete');