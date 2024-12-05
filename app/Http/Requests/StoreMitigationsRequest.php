<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMitigationsRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan untuk membuat permintaan ini.
     */
    public function authorize(): bool
    {
        // Mengatur ke true jika Anda ingin membolehkan akses ini untuk semua pengguna yang terotentikasi
        return true;
    }

    /**
     * Mendapatkan aturan validasi yang diterapkan pada permintaan ini.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'risks_id' => 'required|integer|exists:risks,id',
            'action' => 'required|max:255', // Nama mitigasi harus diisi dan maksimal 255 karakter
            'priority' => 'required|In:High,Middle,Low', // Deskripsi mitigasi harus diisi dan maksimal 500 karakter
        ];
    }
}
