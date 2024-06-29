<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimpananModel extends Model
{
    use HasFactory;

    protected $table = 'tb_simpanan';
    protected $fillable = [
        'nama_lengkap',
        'no_telepon',
        'email',
        'provinsi',
        'kota',
        'id_jumlah_simpanan',
    ];

    public function jumlahSimpanan()
    {
        return $this->belongsTo(ListJumlahSimpananModel::class, 'id_jumlah_simpanan');
    }
}
