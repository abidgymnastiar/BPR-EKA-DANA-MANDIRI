<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NasabahController;

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('nasabah', [NasabahController::class, 'index'])->name('nasabah');