<?php
use App\Models\FotoProdukModel;
use App\Models\KategoriProdukModel;
use App\Models\ProdukModel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\post;
use function Pest\Laravel\delete;
use function Pest\Laravel\put;

uses(RefreshDatabase::class);
beforeEach(function () {
    $this->user = User::factory()->create();
});
it('can create kategori produk', function () {
    actingAs($this->user)->post('/admin/produk/kategori/store', [
        csrf_field(),
        'nama_kategori' => 'Kategori Baru',
        'deskripsi' => 'Deskripsi Kategori Baru',
    ])->assertSessionHasNoErrors()->assertStatus(201);
});
it('cannot create kategori produk if unauthorize', function () {
    post('/admin/produk/kategori/store', [
        csrf_field(),
        'nama_kategori' => 'Kategori Baru',
        'deskripsi' => 'Deskripsi Kategori Baru',
    ])->assertStatus(302);
});

it('can create produk', function () {
    KategoriProdukModel::factory()->count(5)->create();
    $response = actingAs($this->user)->post('/admin/produk/store', [
        csrf_field(),
        'nama_produk' => 'Produk Baru',
        'deskripsi' => 'Deskripsi Produk Baru',
        'harga' => 10000,
        'stok' => 10,
        'kategori_id' => KategoriProdukModel::all()->random()->id,
        'gambar' => UploadedFile::fake()->image('foto-cover.jpg'),
        'foto' => [
            UploadedFile::fake()->image('foto1.jpg'),
            UploadedFile::fake()->image('foto2.jpg'),
        ]
    ]);

    $response->assertSessionHasNoErrors()->assertStatus(201);
    $response->assertJson(['message' => 'Produk berhasil disimpan']);
});

it('cannot create produk without required fields', function () {
    actingAs($this->user)->post('/admin/produk/store', [
        csrf_field(),
    ])->assertSessionHasErrors(['nama_produk', 'deskripsi', 'harga', 'stok', 'kategori_id', 'gambar', 'foto']);
});

test('get image attribute', function () {
    ProdukModel::factory()->count(5)->create();
    $produk = ProdukModel::first();
    expect($produk->getGambar())->toBeUrl();
});

it('can update produk', function () {
    ProdukModel::factory()->count(5)->create();
    $produk = ProdukModel::first();
    actingAs($this->user)->put('/admin/produk/update/' . $produk->id, [
        csrf_field(),
        'nama_produk' => 'Produk Baru Update',
        'deskripsi' => 'Deskripsi Produk Baru Update',
        'harga' => 10000,
        'stok' => 10,
        'kategori_id' => KategoriProdukModel::all()->random()->id,
        'gambar' => UploadedFile::fake()->image('foto-cover.jpg'),
        'foto' => [
            UploadedFile::fake()->image('foto1.jpg'),
            UploadedFile::fake()->image('foto2.jpg'),
        ]
    ])->assertSessionHasNoErrors()->assertStatus(200);
});

it('can add foto produk', function () {
    ProdukModel::factory()->count(5)->create();
    $produk = ProdukModel::first();
    $response = actingAs($this->user)->post('/admin/produk/foto/add', [
        csrf_field(),
        'produk_id' => $produk->id,
        'foto' => [
            UploadedFile::fake()->image('foto3.jpg'),
            UploadedFile::fake()->image('foto4.jpg'),
        ],
    ]);
    $response->assertSessionHasNoErrors()->assertStatus(201);
});

it('can delete produk', function () {
    ProdukModel::factory()->count(5)->create();
    $produk = ProdukModel::first();
    $response = actingAs($this->user)->delete('/admin/produk/delete/' . $produk->id);
    $response->assertSessionHasNoErrors()->assertStatus(200);
});

it('can delete foto produk', function () {
    FotoProdukModel::factory()->count(5)->create();
    $produk = ProdukModel::first();
    $foto = $produk->foto_produk->first();
    $response = actingAs($this->user)->delete('/admin/produk/foto/delete/' . $foto->id);
    $response->assertSessionHasNoErrors()->assertStatus(200);
});

it('can delete kategori produk', function () {
    KategoriProdukModel::factory()->count(5)->create();
    $kategori = KategoriProdukModel::first();
    $response = actingAs($this->user)->delete('/admin/produk/kategori/delete/' . $kategori->id);
    $response->assertSessionHasNoErrors()->assertStatus(200);
});