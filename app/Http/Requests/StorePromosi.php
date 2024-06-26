<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
/**
 * @property mixed nama
 * @property mixed deskripsi
 * @property mixed gambar
 * @property mixed author
 * @property mixed id
 */
class StorePromosi extends FormRequest
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
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar' => 'required|image',
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
            'nama.required' => 'Nama harus diisi',
            'nama.string' => 'Nama harus berupa string',
            'deskripsi.required' => 'Deskripsi harus diisi',
            'deskripsi.string' => 'Deskripsi harus berupa string',
            'gambar.required' => 'Gambar harus diisi',
            'gambar.image' => 'Gambar harus berupa file gambar',
        ];
    }
}
