<?php

use App\Models\PeminjamanModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\post;
use function Pest\Laravel\get;
use function Pest\Laravel\delete;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed();
});

test('create method success', function () {
    $data = [
        'nama_lengkap' => 'John Doe',
        'no_hp' => '081234567890',
        'email' => 'test@example.com',
        'provinsi' => 'Jawa Barat',
        'kota' => 'Bandung',
        'pekerjaan' => 'PNS',
        'id_jaminan' => 1,
        'sertifikat_atas_nama' => 'pemohon/pasangan',
        'jumlah_pinjaman' => '500 Juta - 1 Miliar',
    ];
    $response = post('/peminjaman', $data);
    $response->assertStatus(200);
    $response->assertJson([
        'data' => $data,
        'message' => 'Peminjaman berhasil disimpan',
    ]);
});

test('create method failure', function () {
    $response = post('/peminjaman', []);
    $response->assertStatus(302); // Or the specific error status code
});

test('show method with existing data', function () {
    $peminjaman = PeminjamanModel::factory()->create();
    $response = get("/peminjaman/show/$peminjaman->id_peminjaman");
    $response->assertStatus(200);
});

test('show method with non-existing data', function () {
    $response = get('/peminjaman/show/999');
    $response->assertStatus(404);
    $response->assertJson([
        'message' => 'Data tidak ditemukan',
    ]);
});

test('delete method success', function () {
    $peminjaman = PeminjamanModel::factory()->create();
    $response = delete("/peminjaman/delete/$peminjaman->id_peminjaman");
    $response->assertStatus(200);
    $response->assertJson([
        'message' => 'Peminjaman berhasil dihapus',
    ]);
});

test('delete method failure', function () {
    $response = delete('/peminjaman/delete/999');
    $response->assertStatus(500); // Or the specific error status code
    $response->assertJson([
        'message' => 'Data tidak ditemukan',
    ]);
});