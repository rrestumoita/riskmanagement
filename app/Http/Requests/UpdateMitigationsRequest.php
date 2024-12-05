<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMitigationsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
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
