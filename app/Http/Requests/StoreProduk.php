<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Produk request class
 * @property string $nama_produk
 * @property string $deskripsi
 * @property int $harga
 * @property int $stok
 * @property mixed $gambar
 * @property int $kategori_id
 * @property mixed $foto
 * @package App\Http\Requests
 */
class StoreProduk extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_produk' => 'required|string',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'gambar' => 'required|image|max:2048',
            'kategori_id' => 'required|exists:tb_kategori_produk,id',
            'foto.*' => 'required|image|max:2048',
            'foto' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nama_produk.required' => 'Nama produk wajib diisi',
            'nama_produk.string' => 'Nama produk harus berupa string',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'deskripsi.string' => 'Deskripsi harus berupa string',
            'harga.required' => 'Harga wajib diisi',
            'harga.numeric' => 'Harga harus berupa angka',
            'stok.required' => 'Stok wajib diisi',
            'stok.numeric' => 'Stok harus berupa angka',
            'gambar.required' => 'Gambar wajib diisi',
            'gambar.image' => 'Gambar harus berupa file gambar',
            'gambar.max' => 'Gambar maksimal berukuran 2MB',
            'kategori_id.required' => 'Kategori produk wajib diisi',
            'kategori_id.exists' => 'Kategori produk tidak ditemukan',
            'foto.*.required' => 'Foto produk wajib diisi',
            'foto.required' => 'Foto produk wajib diisi',
            'foto.*.image' => 'Foto produk harus berupa file gambar',
            'foto.*.max' => 'Foto produk maksimal berukuran 2MB',
        ];
    }
}
