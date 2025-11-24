<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePembayaranRequest extends FormRequest
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
            'id_user' => ['sometimes', 'integer', 'exists:pengguna,id_user'],
            'id_metode_pembayaran' => ['sometimes', 'integer', 'exists:metode_pembayaran,id_metode_pembayaran'],
            'jumlah_dibayar' => ['sometimes', 'numeric', 'min:0'],
            'status_pembayaran' => ['sometimes', 'in:belum_lunas,sebagian,lunas'],
            'tanggal_pembayaran' => ['nullable', 'date'],
            'keterangan' => ['nullable', 'string', 'max:255'],
        ];
    }
}
