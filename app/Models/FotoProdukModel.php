<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FotoProdukModel
 * 
 * This class represents the FotoProdukModel model in the application.
 * It extends the base Model class and defines the table name, primary key, and fillable attributes.
 * @property string $foto
 * @property int $produk_id
 * @package App\Models
 */
class FotoProdukModel extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tb_foto_produk';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foto',
        'produk_id'
    ];

    /**
     * Get the produk that owns the foto.
     */
    public function produk()
    {
        return $this->belongsTo(ProdukModel::class, 'produk_id', 'id');
    }

    /**
     * Get the foto attribute.
     *
     * @return string
     */
    public function getFotoProduk()
    {
        if (file_exists(public_path('storage/produk/' . $this->foto))) {
            return asset('storage/produk/' . $this->foto);
        } else {
            return asset('assets/images/not-found.avif');
        }
    }
}
