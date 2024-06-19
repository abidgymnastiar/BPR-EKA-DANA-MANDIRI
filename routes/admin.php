<?php
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');