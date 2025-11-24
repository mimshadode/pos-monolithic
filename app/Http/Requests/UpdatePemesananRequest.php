<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePemesananRequest extends FormRequest
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
            'status_pemesanan' => ['sometimes', 'in:baru,diproses,selesai,dibatalkan'],
            'items' => ['sometimes', 'array', 'min:1'],
            'items.*.id_produk' => ['required_with:items', 'integer', 'exists:produk,id_produk'],
            'items.*.qty' => ['required_with:items', 'integer', 'min:1'],
            'items.*.diskon' => ['nullable', 'numeric', 'min:0'],
            'items.*.catatan' => ['nullable', 'string', 'max:255'],
        ];
    }
}
