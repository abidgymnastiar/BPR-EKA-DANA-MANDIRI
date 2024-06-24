<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Produk request class
 * @property int $id
 * @property string $nama_produk
 * @property string $deskripsi
 * @property int $harga
 * @property int $stok
 * @property mixed $gambar
 * @property int $kategori_id
 * @property int $author
 * @property mixed $foto
 * @property-read FotoProdukModel[] $foto_produk
 * @package App\Models
 */
class ProdukModel extends Model
{
    use HasFactory;
    protected $table = 'tb_produk';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        'kategori_id',
        'author',
    ];

    /**
     * Get the author of the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    /**
     * Get the category of the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriProdukModel::class, 'kategori_id', 'id');
    }

    /**
     * Get the photos of the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function foto_produk(): HasMany
    {
        return $this->hasMany(FotoProdukModel::class, 'produk_id', 'id');
    }

    /**
     * Get the gambar attribute.
     * @return string
     */
    public function getGambar(): string
    {
        // check if image is null or image exists
        if ($this->gambar == null || !file_exists(public_path('storage/produk/' . $this->gambar))) {
            return asset('assets/images/not-found.avif');
        } else {
            return asset('storage/produk/' . $this->gambar);
        }
    }
}
