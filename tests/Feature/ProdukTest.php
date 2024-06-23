<?php
use App\Models\KategoriProdukModel;
use App\Models\ProdukModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use function Pest\Laravel\post;
use function Pest\Laravel\delete;
use function Pest\Laravel\put;

// uses(RefreshDatabase::class);
it('can create kategori produk', function () {
    post('/admin/produk/kategori/store', [
        csrf_field(),
        'nama_kategori' => 'Kategori Baru',
        'deskripsi' => 'Deskripsi Kategori Baru',
    ])->assertSessionHasNoErrors()->assertStatus(201);
});

it('can create produk', function () {
    $response = post('/admin/produk/store', [
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
    post('/admin/produk/store', [
        csrf_field(),
    ])->assertSessionHasErrors(['nama_produk', 'deskripsi', 'harga', 'stok', 'kategori_id', 'gambar', 'foto'])->dumpSession();
});

test('get image attribute', function () {
    $produk = ProdukModel::first();
    expect($produk->getGambar())->toBeUrl();
});

it('can update produk', function () {
    $produk = ProdukModel::first();
    put('/admin/produk/update/' . $produk->id, [
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
    $produk = ProdukModel::first();
    $response = post('/admin/produk/foto/add', [
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
    $produk = ProdukModel::first();
    $response = delete('/admin/produk/delete/' . $produk->id);
    $response->assertSessionHasNoErrors()->assertStatus(200);
});

it('can delete foto produk', function () {
    $produk = ProdukModel::first();
    $foto = $produk->foto_produk->first();
    $response = delete('/admin/produk/foto/delete/' . $foto->id);
    $response->assertSessionHasNoErrors()->assertStatus(200);
});

it('can delete kategori produk', function () {
    $kategori = KategoriProdukModel::first();
    $response = delete('/admin/produk/kategori/delete/' . $kategori->id);
    $response->assertSessionHasNoErrors()->assertStatus(200);
});