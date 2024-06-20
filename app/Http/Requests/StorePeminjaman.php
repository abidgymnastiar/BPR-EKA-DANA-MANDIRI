<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePeminjaman extends FormRequest
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
            'nama_lengkap' => 'required|string',
            'no_hp' => 'required|string',
            'email' => 'required|email',
            'provinsi' => 'required|string',
            'kota' => 'required|string',
            'pekerjaan' => 'required|string',
            'id_jaminan' => 'required|exists:tb_jenis_jaminan,id_jaminan',
            'sertifikat_atas_nama' => 'required|string',
            'jumlah_pinjaman' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi',
            'no_hp.required' => 'Nomor HP wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'provinsi.required' => 'Provinsi wajib diisi',
            'kota.required' => 'Kota wajib diisi',
            'pekerjaan.required' => 'Pekerjaan wajib diisi',
            'id_jaminan.required' => 'Jaminan wajib diisi',
            'id_jaminan.exists' => 'Jaminan tidak valid',
            'sertifikat_atas_nama.required' => 'Sertifikat atas nama wajib diisi',
            'jumlah_pinjaman.required' => 'Jumlah pinjaman wajib diisi',
        ];
    }
}
