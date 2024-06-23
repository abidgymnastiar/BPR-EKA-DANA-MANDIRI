<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreKategoriProduk
 * 
 * This class represents the form request for store kategori produk.
 * @property string $nama_kategori
 * @property string $deskripsi
 * @package App\Http\Requests
 */
class StoreKategoriProduk extends FormRequest
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
            'nama_kategori' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nama_kategori.required' => 'Nama kategori wajib diisi',
            'nama_kategori.string' => 'Nama kategori harus berupa string',
            'nama_kategori.max' => 'Nama kategori maksimal 255 karakter',
            'deskripsi.required' => 'Deskripsi wajib diisi',
        ];
    }
}
