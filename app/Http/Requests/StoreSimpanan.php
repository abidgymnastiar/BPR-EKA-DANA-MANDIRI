<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSimpanan extends FormRequest
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
            'nama_lengkap' => ['required', 'string'],
            'no_telepon' => ['required', 'string'],
            'email' => ['required', 'email'],
            'provinsi' => ['required', 'string'],
            'kota' => ['required', 'string'],
            'id_jumlah_simpanan' => ['required', 'exists:tb_list_jumlah_simpanan,id'],
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
            'no_telepon.required' => 'Nomor telepon wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email tidak valid',
            'provinsi.required' => 'Provinsi wajib diisi',
            'kota.required' => 'Kota wajib diisi',
            'id_jumlah_simpanan.required' => 'Jumlah simpanan wajib diisi',
            'id_jumlah_simpanan.exists' => 'Jumlah simpanan tidak valid',
        ];
    }
}
