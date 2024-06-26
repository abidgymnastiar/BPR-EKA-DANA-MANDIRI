<?php
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\NasabahController;
use App\Http\Controllers\Admin\PromosiController;

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
    Route::get('/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
    Route::post('/store', [KegiatanController::class, 'store'])->name('kegiatan.store');
    Route::get('/edit/{id}', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
    Route::put('/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
    Route::delete('/delete/{id}', [KegiatanController::class, 'delete'])->name('kegiatan.delete');
    Route::post('/kategori/store', [KegiatanController::class, 'store_kategori'])->name('kegiatan.kategori.store');
});

Route::prefix('promosi')->group(function (){
    Route::get('/', [PromosiController::class, 'index'])->name('promosi');
    Route::get('/create', [PromosiController::class, 'create'])->name('promosi.create');
    Route::post('/store', [PromosiController::class, 'store'])->name('promosi.store');
    Route::get('/edit/{id}', [PromosiController::class, 'edit'])->name('promosi.edit');
    Route::put('/{id}', [PromosiController::class, 'update'])->name('promosi.update');
    Route::delete('/delete/{id}', [PromosiController::class, 'delete'])->name('promosi.delete');
});
