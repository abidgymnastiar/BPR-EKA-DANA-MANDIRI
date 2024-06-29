<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed author_id
 * @property mixed jumlah_simpanan
 */
class ListJumlahSimpananModel extends Model
{
    use HasFactory;

    protected $table = 'tb_list_jumlah_simpanan';
    protected $fillable = [
        'jumlah_simpanan',
        'author_id'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
