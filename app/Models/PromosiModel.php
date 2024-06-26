<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromosiModel extends Model
{
    use HasFactory;

    protected $table = 'tb_promosi';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'deskripsi', 'gambar', 'author'];
    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function getGambar()
    {
        if ($this->gambar == null || !file_exists(public_path('storage/promosi/' . $this->gambar))) {
            return asset('assets/images/not-found.avif');
        } else {
            return asset('storage/promosi/' . $this->gambar);
        }
    }
}
