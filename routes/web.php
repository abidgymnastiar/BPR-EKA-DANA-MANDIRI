<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\PeminjamanController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/setup', [AuthController::class, 'setup'])->middleware('guest')->name('setup');
Route::post('/setup', [AuthController::class, 'setup_process'])->middleware('guest')->name('setup.process');
Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/home', function () {
    return view('user.home');
})->name('home');

Route::post('/peminjaman', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::get('/peminjaman/show/{id}', [PeminjamanController::class, 'show'])->name('peminjaman.show');
Route::delete('/peminjaman/delete/{id}', [PeminjamanController::class, 'delete'])->name('peminjaman.delete');