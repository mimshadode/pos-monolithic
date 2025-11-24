<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePembayaranRequest extends FormRequest
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
            'id_pemesanan' => ['required', 'integer', 'exists:pemesanan,id_pemesanan'],
            'id_user' => ['required', 'integer', 'exists:pengguna,id_user'],
            'id_metode_pembayaran' => ['required', 'integer', 'exists:metode_pembayaran,id_metode_pembayaran'],
            'jumlah_dibayar' => ['required', 'numeric', 'min:0'],
            'status_pembayaran' => ['sometimes', 'in:belum_lunas,sebagian,lunas'],
            'tanggal_pembayaran' => ['nullable', 'date'],
            'keterangan' => ['nullable', 'string', 'max:255'],
        ];
    }
}
