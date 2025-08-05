<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class KegiatanModel
 *
 * This class represents the Kegiatan model in the application.
 * It extends the base Model class and defines the table name, primary key, and fillable attributes.
 * @property int $id
 * @property string $nama_kegiatan
 * @property string $isi
 * @property string $tgl_mulai
 * @property string $tgl_selesai
 * @property string $gambar
 * @property int $author
 */
class KegiatanModel extends Model
{
    use HasFactory;

    protected $table = 'tb_kegiatan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kegiatan',
        'isi',
        'tgl_mulai',
        'tgl_selesai',
        'gambar',
        'author',
    ];

    /**
     * Get the related KegiatanKegiatanKategoriModel records for this Kegiatan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kategori(): HasMany
    {
        return $this->hasMany(KegiatanKegiatanKategoriModel::class, 'kegiatan_id');
    }

    /**
     * Get the URL of the gambar (image) for this Kegiatan.
     * If the image is null or does not exist, a default image URL is returned.
     *
     * @return string
     */
    public function getGambarUrlAttribute()
    {
        if (!$this->gambar || !file_exists(public_path('uploads/kegiatan/' . $this->gambar))) {
            return asset('assets/images/not-found.avif');
        }

        return asset('uploads/kegiatan/' . $this->gambar);
    }


    public function getKategori(): string
    {
        $kategori = $this->kategori->map(function ($item) {
            return $item->kategori->nama_kategori;
        })->toArray();
        return implode(', ', $kategori);
    }

    public function getCuplikanIsi(): string
    {
        // ambil 100 karakter pertama dari isi dan hilangkan html
        return strip_tags(substr($this->isi, 0, 100));
    }
}
