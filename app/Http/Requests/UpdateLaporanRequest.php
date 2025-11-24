<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLaporanRequest extends FormRequest
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
            'periode_mulai' => ['sometimes', 'date'],
            'periode_selesai' => ['sometimes', 'date', 'after_or_equal:periode_mulai'],
            'jenis' => ['sometimes', 'in:harian,mingguan,bulanan'],
            'keterangan' => ['nullable', 'string', 'max:255'],
        ];
    }
}
