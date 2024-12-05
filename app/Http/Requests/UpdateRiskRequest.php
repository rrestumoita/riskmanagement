<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRiskRequest extends FormRequest
{
    /**
     * Tentukan apakah pengguna diizinkan untuk membuat permintaan ini.
     */
    public function authorize(): bool
    {
        // Setel ke true jika Anda ingin membolehkan akses ini untuk semua pengguna yang terotentikasi
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
            'description' => 'required|max:500', // Deskripsi risiko wajib diisi dan tidak lebih dari 500 karakter
            'severity' => 'nullable|integer|min:1|max:10', // Severity bersifat opsional, tapi jika diisi, harus antara 1-10
            'occurrence' => 'nullable|integer|min:1|max:10', // Occurrence bersifat opsional, jika diisi harus antara 1-10
            'detection' => 'nullable|integer|min:1|max:10', // Detection bersifat opsional, jika diisi harus antara 1-10
        ];
    }

    /**
     * Menambahkan fungsi untuk menghitung RPN (Risk Priority Number) di dalam request
     */
    public function calculateRPN(): int
    {
        // Mendapatkan nilai dari input yang telah diubah
        $severity = $this->input('severity', 1); // Nilai default jika tidak diberikan
        $occurrence = $this->input('occurrence', 1); // Nilai default jika tidak diberikan
        $detection = $this->input('detection', 1); // Nilai default jika tidak diberikan

        // Menghitung RPN sebagai hasil perkalian severity, occurrence, dan detection
        return $severity * $occurrence * $detection;
    }
}
