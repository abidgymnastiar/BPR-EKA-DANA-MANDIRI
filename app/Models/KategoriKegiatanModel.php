<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $nama_kategori
 * @property string $keterangan
 * @property string $color_label
 * @property string $icon
 */
class KategoriKegiatanModel extends Model
{
    use HasFactory;

    protected $table = 'tb_kategori_kegiatan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kategori',
        'keterangan',
        'color_label',
        'icon',
    ];

    public function kegiatan()
    {
        return $this->hasMany(KegiatanKegiatanKategoriModel::class, 'kegiatan_kategori_id');
    }
}
