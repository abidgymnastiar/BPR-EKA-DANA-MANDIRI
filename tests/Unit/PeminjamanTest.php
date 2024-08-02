<?php

use App\Models\PeminjamanModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\post;
use function Pest\Laravel\get;
use function Pest\Laravel\delete;

uses(RefreshDatabase::class);

beforeEach(function () {
    // login as admin
    $user = \App\Models\User::factory()->create();
    \Pest\Laravel\actingAs($user);
    \Pest\Laravel\seed();
});

test('create method success', function () {
    $data = [
        'nama_lengkap' => 'John Doe',
        'no_hp' => '081234567890',
        'email' => 'test@example.com',
        'provinsi' => 'Jawa Barat',
        'kota' => 'Bandung',
        'pekerjaan' => 'PNS',
        'id_jaminan' => \App\Models\JenisJaminanModel::first()->id_jaminan,
        'sertifikat_atas_nama' => 'pemohon/pasangan',
        'id_jumlah_peminjaman' => \App\Models\ListJumlahPeminjamanModel::factory()->create()->id,
    ];
    $response = post(route('peminjaman.create'), $data);
    $response->assertSessionHasNoErrors();
    $response->assertStatus(200);
    $response->assertJson([
        'data' => $data,
        'message' => 'Peminjaman berhasil disimpan',
    ]);

    // Additional assertions to check database state
    $this->assertDatabaseHas('tb_peminjaman', [
        'nama_lengkap' => 'John Doe',
        'email' => 'test@example.com',
    ]);
});

test('create method failure', function () {
    $response = post('/peminjaman', []);
    $response->assertStatus(302); // Or the specific error status code
});

test('show method with existing data', function () {
    $peminjaman = PeminjamanModel::factory()->create();
    $response = get(route('admin.peminjam.show', ['id' => $peminjaman->id_peminjaman]));
    $response->assertStatus(200);
});

test('show method with non-existing data', function () {
    $response = get(route('admin.peminjam.show', ['id' => 999]));
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
