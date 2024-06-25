<?php
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\NasabahController;

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

// Nasabah
Route::prefix('nasabah')->group(function () {
    Route::get('/', [NasabahController::class, 'index'])->name('nasabah');
});
// Kegiatan
Route::prefix('kegiatan')->group(function () {
    Route::get('/', [KegiatanController::class, 'index'])->name('kegiatan');
    Route::post('/store', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::put('/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/delete/{id}', [KegiatanController::class, 'delete'])->name('kegiatan.delete');
    Route::post('/kategori/store', [KegiatanController::class, 'store_kategori'])->name('kegiatan.kategori.store');
});
