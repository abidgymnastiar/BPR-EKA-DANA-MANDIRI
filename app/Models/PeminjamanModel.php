<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanModel extends Model
{
    use HasFactory;
    protected $table = 'tb_peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $fillable = [
        'nama_lengkap',
        'no_hp',
        'email',
        'provinsi',
        'kota',
        'pekerjaan',
        'id_jaminan',
        'sertifikat_atas_nama',
        'jumlah_pinjaman',
        'id_jumlah_peminjaman',
        'status',
    ];

    public function jenisJaminan()
    {
        return $this->belongsTo(JenisJaminanModel::class, 'id_jaminan', 'id_jaminan');
    }

    public function jumlahPeminjaman()
    {
        return $this->belongsTo(ListJumlahPeminjamanModel::class, 'id_jumlah_peminjaman', 'id');
    }
}
