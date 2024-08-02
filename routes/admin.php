<?php
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\PeminjamanController;
use App\Http\Controllers\Admin\PromosiController;
use App\Http\Controllers\Admin\SimpananController;

Route::get('/', function () {
    return redirect()->route('admin.dashboard');
});

// Peminjam
Route::prefix('peminjaman')->group(function () {
    Route::get('/', [PeminjamanController::class, 'index'])->name('peminjam');
    Route::get('/show/{id}', [PeminjamanController::class, 'show'])->name('peminjam.show');
    Route::prefix('kategori')->group(function(){
        Route::get('/',[PeminjamanController::class,'index_kategori'])->name('peminjam.kategori');
        Route::get('/create',[PeminjamanController::class,'create_kategori'])->name('peminjam.kategori.create');
        Route::post('/peminjaman',[PeminjamanController::class,'store_kategori_jumlah_peminjam'])->name('peminjam.kategori.store');
        Route::get('/edit/{id}',[PeminjamanController::class,'edit_kategori'])->name('peminjam.kategori.edit');
        Route::put('/{id}',[PeminjamanController::class,'update_kategori'])->name('peminjam.kategori.update');
        Route::delete('/delete/{id}',[PeminjamanController::class,'delete_kategori'])->name('peminjam.kategori.delete');
    });

    Route::prefix('jaminan')->group(function(){
        Route::get('/',[PeminjamanController::class,'index_jaminan'])->name('peminjam.jaminan');
        Route::get('/create',[PeminjamanController::class,'create_jaminan'])->name('peminjam.jaminan.create');
        Route::post('/jaminan',[PeminjamanController::class,'store_jaminan'])->name('peminjam.jaminan.store');
        Route::get('/edit/{id}',[PeminjamanController::class,'edit_jaminan'])->name('peminjam.jaminan.edit');
        Route::put('/{id}',[PeminjamanController::class,'update_jaminan'])->name('peminjam.jaminan.update');
        Route::delete('/delete/{id}',[PeminjamanController::class,'delete_jaminan'])->name('peminjam.jaminan.delete');
    });
    Route::put('/update-status',[PeminjamanController::class,'update_status_peminjaman'])->name('peminjam.update-status');
});
// Simpanan
Route::prefix('simpanan')->group(function () {
    Route::get('/', [SimpananController::class, 'index'])->name('simpanan');

    Route::prefix('kategori')->group(function(){
        Route::get('/',[SimpananController::class,'index_kategori'])->name('simpanan.kategori');
        Route::get('/create',[SimpananController::class,'create_kategori'])->name('simpanan.kategori.create');
        Route::post('/simpanan',[SimpananController::class,'store_kategori_jumlah_simpanan'])->name('simpanan.kategori.store');
        Route::get('/edit/{id}',[SimpananController::class,'edit_kategori'])->name('simpanan.kategori.edit');
        Route::put('/{id}',[SimpananController::class,'update_kategori'])->name('simpanan.kategori.update');
        Route::delete('/delete/{id}',[SimpananController::class,'delete_kategori'])->name('simpanan.kategori.delete');
    });
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
