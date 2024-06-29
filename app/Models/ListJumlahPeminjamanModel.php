<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListJumlahPeminjamanModel extends Model
{
    use HasFactory;

    protected $table = 'tb_list_jumlah_peminjaman';

    protected $primaryKey = 'id';

    protected $fillable = [
        'jumlah_peminjaman',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
