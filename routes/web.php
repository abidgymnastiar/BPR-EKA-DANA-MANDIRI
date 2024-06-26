<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\User\PeminjamanController;
use Illuminate\Support\Facades\Route;

Route::
        namespace('Admin')->prefix('admin')->middleware('auth')->name('admin.')->group(base_path('routes/admin.php'));

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/setup', [AuthController::class, 'setup'])->middleware('guest')->name('setup');
Route::post('/setup', [AuthController::class, 'setup_process'])->middleware('guest')->name('setup.process');
Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::post('/peminjaman', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::get('/peminjaman/show/{id}', [PeminjamanController::class, 'show'])->name('peminjaman.show');
Route::delete('/peminjaman/delete/{id}', [PeminjamanController::class, 'delete'])->name('peminjaman.delete');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/home', function () {
    return view('user.home');
})->name('home');

Route::get('/tentangKami', function () {
    return view('user.tentangKami');
})->name('tentangKami');

Route::get('/simpan', function () {
    return view('user.simpan');
})->name('simpan');

Route::get('/info', function () {
    return view('user.info');
})->name('info');

