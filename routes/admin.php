<?php
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\NasabahController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return redirect()->route('admin');
});
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Nasabah
    Route::prefix('nasabah')->group(function () {
        Route::get('/', [NasabahController::class, 'index'])->name('nasabah');
    });
    // Kegiatan
    Route::prefix('kegiatan')->group(function () {
        Route::get('/', [KegiatanController::class, 'index'])->name('kegiatan');
        Route::post('/store', [KegiatanController::class, 'store'])->name('kegiatan.store');
        Route::delete('/delete/{id}', [KegiatanController::class, 'delete'])->name('kegiatan.delete');
        Route::post('/kategori/store', [KegiatanController::class, 'store_kategori'])->name('kegiatan.kategori.store');

    });
    // Produk
    Route::prefix('produk')->group(function () {
        Route::get('/', [ProdukController::class, 'index'])->name('produk');
        Route::post('store', [ProdukController::class, 'store'])->name('produk.store');
        Route::post('kategori/store', [ProdukController::class, 'store_kategori'])->name('produk.kategori.store');
        Route::delete('delete/{id}', [ProdukController::class, 'delete'])->name('produk.delete');
        Route::get('show/{id}', [ProdukController::class, 'show'])->name('produk.show');
        Route::put('update/{id}', [ProdukController::class, 'update'])->name('produk.update');
        Route::post('foto/add', [ProdukController::class, 'addFoto'])->name('produk.foto.add');
        Route::delete('foto/delete/{id}', [ProdukController::class, 'deleteFoto'])->name('produk.foto.delete');
        Route::delete('kategori/delete/{id}', [ProdukController::class, 'deleteKategori'])->name('produk.kategori.delete');
    });
});
