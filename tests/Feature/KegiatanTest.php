<?php
use App\Models\KategoriKegiatanModel;
use App\Models\KegiatanKegiatanKategoriModel;
use App\Models\KegiatanModel;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

// uses(RefreshDatabase::class);
beforeEach(function () {
    $this->user = User::factory()->create();
});
it('redirect to login', function () {
    $response = get('/admin/kegiatan');
    $response->assertStatus(302)->assertRedirect('/login');
});

it('has kegiatan page', function () {
    $response = actingAs($this->user)->get('/admin/kegiatan');
    $response->assertStatus(200);
});

it('can create kategori kegiatan', function () {
    $response = actingAs($this->user)->post(route('admin.kegiatan.kategori.store'), [
        csrf_field(),
        'nama_kategori' => 'Kategori Baru',
        'keterangan' => 'Keterangan Kategori Baru',
        'color_label' => '#000000',
        'icon' => 'fa-address-book',
    ]);
    $response->assertStatus(302)->assertRedirect('/admin/kegiatan');
    $response->assertSessionHas('success', 'Kategori kegiatan berhasil ditambahkan');
});

it('can create kegiatan', function () {
    KategoriKegiatanModel::factory(5)->create()->each(function ($kategori) {
        $this->kategori[] = $kategori->id;
    });
    $response = actingAs($this->user)->post(route('admin.kegiatan.store'), [
        csrf_field(),
        'nama_kegiatan' => 'Kegiatan Baru',
        'isi' => fake()->paragraph(3),
        'tgl_mulai' => fake()->dateTime()->format('Y-m-d H:i:s'),
        'tgl_selesai' => fake()->dateTime()->format('Y-m-d H:i:s'),
        'gambar' => UploadedFile::fake()->image('gambar.jpg'),
        'kategori' => $this->kategori,
    ]);
    $response->assertStatus(302)->assertRedirect('/admin/kegiatan');
    $response->assertSessionHas('success', 'Kegiatan berhasil ditambahkan');
});

it('can not create kegiatan without kategori', function () {
    $response = actingAs($this->user)->post(route('admin.kegiatan.store'), [
        csrf_field(),
        'nama_kegiatan' => 'Kegiatan Baru',
        'isi' => fake()->paragraph(3),
        'tgl_mulai' => fake()->dateTime()->format('Y-m-d H:i:s'),
        'tgl_selesai' => fake()->dateTime()->format('Y-m-d H:i:s'),
        'gambar' => UploadedFile::fake()->image('gambar.jpg'),
    ]);
    $response->assertSessionHasErrors('kategori');
});

it('can delete kegiatan', function () {
    KategoriKegiatanModel::factory(5)->create()->each(function ($kategori) {
        $this->kategori[] = $kategori->id;
    });
    $kegiatan = KegiatanModel::factory()->create();
    KegiatanKegiatanKategoriModel::factory(2)->create([
        'kegiatan_id' => $kegiatan->id,
        'kegiatan_kategori_id' => $this->kategori[random_int(0, 4)],
    ]);
    $response = actingAs($this->user)->delete(route('admin.kegiatan.delete', $kegiatan->id));
    $response->assertStatus(302)->assertRedirect('/admin/kegiatan');
    $response->assertSessionHas('success', 'Kegiatan berhasil dihapus');
});

// update kegiatan
it('can update kegiatan', function () {
    KategoriKegiatanModel::factory(5)->create()->each(function ($kategori) {
        $this->kategori[] = $kategori->id;
    });
    $kegiatan = KegiatanModel::factory()->create();
    KegiatanKegiatanKategoriModel::factory(2)->create([
        'kegiatan_id' => $kegiatan->id,
        'kegiatan_kategori_id' => $this->kategori[random_int(0, 4)],
    ]);
    $response = actingAs($this->user)->put(route('admin.kegiatan.update', $kegiatan->id), [
        csrf_field(),
        '_method' => 'PUT',
        'nama_kegiatan' => 'Kegiatan Baru',
        'isi' => fake()->paragraph(3),
        'tgl_mulai' => fake()->dateTime()->format('Y-m-d H:i:s'),
        'tgl_selesai' => fake()->dateTime()->format('Y-m-d H:i:s'),
        'gambar' => UploadedFile::fake()->image('gambar.jpg'),
        'kategori' => $this->kategori,
    ]);
    $response->assertStatus(302)->assertRedirect('/admin/kegiatan');
    $response->assertSessionHas('success', 'Kegiatan berhasil diubah');
});