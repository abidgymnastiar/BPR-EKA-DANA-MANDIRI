<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class KategoriProdukModel
 * 
 * This class represents the KategoriProdukModel model in the application.
 * @property integer $id
 * @property string $nama_kategori
 * @property string $deskripsi
 * @package App\Models
 */
class KategoriProdukModel extends Model
{
    use HasFactory;
    protected $table = 'tb_kategori_produk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    public function produk()
    {
        return $this->hasMany(ProdukModel::class, 'kategori_id', 'id');
    }
}
