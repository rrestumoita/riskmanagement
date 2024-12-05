<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRiskRequest extends FormRequest
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
            'description' => 'required|max:500',
            'severity' => 'required|integer|min:1|max:10', // Validasi severity antara 1 dan 10
            'occurrence' => 'required|integer|min:1|max:10', // Validasi occurrence antara 1 dan 10
            'detection' => 'required|integer|min:1|max:10', // Validasi detection antara 1 dan 10
        ];
    }

    /**
     * Menambahkan fungsi untuk menghitung RPN (Risk Priority Number) di dalam request
     */
    public function calculateRPN(): int
    {
        $severity = $this->input('severity');
        $occurrence = $this->input('occurrence');
        $detection = $this->input('detection');

        // Menghitung RPN sebagai hasil perkalian severity, occurrence, dan detection
        return $severity * $occurrence * $detection;
    }
}
