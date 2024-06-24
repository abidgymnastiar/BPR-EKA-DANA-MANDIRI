<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property array[] $kategori
 * @property object $gambar
 * @property \date $tgl_selesai
 * @property \date $tgl_mulai
 * @property string $isi
 * @property string $nama_kegiatan
 */
class StoreKegiatan extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_kegiatan' => ['required', 'string'],
            'isi' => ['required', 'string'],
            'tgl_mulai' => ['required'],
            'tgl_selesai' => ['required'],
            'gambar' => ['required', 'image'],
            'kategori' => ['required', 'array'],
            'kategori.*' => ['required', 'integer', 'exists:tb_kategori_kegiatan,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'nama_kegiatan.required' => 'Nama kegiatan tidak boleh kosong',
            'isi.required' => 'Isi kegiatan tidak boleh kosong',
            'tgl_mulai.required' => 'Tanggal mulai kegiatan tidak boleh kosong',
            'tgl_selesai.required' => 'Tanggal selesai kegiatan tidak boleh kosong',
            'gambar.required' => 'Gambar kegiatan tidak boleh kosong',
            'kategori.required' => 'Kategori kegiatan tidak boleh kosong',
            'kategori.*.required' => 'Kategori kegiatan tidak boleh kosong',
            'kategori.*.exists' => 'Kategori kegiatan tidak ditemukan',
        ];
    }
}
