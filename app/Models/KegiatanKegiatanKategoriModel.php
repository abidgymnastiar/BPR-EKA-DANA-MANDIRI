<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanKegiatanKategoriModel extends Model
{
    use HasFactory;

    protected $table = 'tb_kegiatan_kegiatan_kategori';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kegiatan_id',
        'kegiatan_kategori_id',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(KegiatanModel::class, 'kegiatan_id');
    }

    public function kategori()
    {
        return $this->belongsTo(KegiatanKegiatanKategoriModel::class, 'kegiatan_kategori_id');
    }
}
