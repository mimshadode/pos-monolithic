<?php

namespace App\Livewire;

use App\Models\Kategori;
use App\Models\Produk;
use Livewire\Attributes\On;
use Livewire\Component;

class EditProduct extends Component
{
    public Produk $produk;

    public string $kode_produk = '';
    public string $nama_produk = '';
    public ?string $deskripsi = null;
    public float|int|null $harga = null;
    public int|null $stok = null;
    public string $status = 'tersedia';
    public int|string|null $id_kategori = null;
    public ?string $successMessage = null;

    protected array $rules = [
        'kode_produk' => ['required', 'string', 'max:20'],
        'nama_produk' => ['required', 'string', 'max:100'],
        'deskripsi' => ['nullable', 'string'],
        'harga' => ['required', 'numeric', 'min:0'],
        'stok' => ['required', 'integer', 'min:0'],
        'status' => ['required', 'in:tersedia,habis'],
        'id_kategori' => ['required', 'exists:kategori,id_kategori'],
    ];

    #[On('edit-product')]
    public function loadProduct(int $produkId): void
    {
        $this->produk = Produk::query()->findOrFail($produkId);

        $this->kode_produk = $this->produk->kode_produk;
        $this->nama_produk = $this->produk->nama_produk;
        $this->deskripsi = $this->produk->deskripsi;
        $this->harga = $this->produk->harga;
        $this->stok = $this->produk->stok;
        $this->status = $this->produk->status;
        $this->id_kategori = $this->produk->id_kategori;

        $this->successMessage = null;
    }

    public function updateProduct(): void
    {
        $this->status = ($this->stok ?? 0) > 0 ? 'tersedia' : 'habis';

        $rules = $this->rules;
        $rules['kode_produk'][] = 'unique:produk,kode_produk,' . $this->produk->id_produk . ',id_produk';

        $validated = $this->validate($rules);

        $this->produk->update($validated);

        $this->successMessage = 'Produk berhasil diperbarui.';

        $this->dispatch('product-updated');
    }

    public function render()
    {
        return view('livewire.edit-product', [
            'kategoriList' => Kategori::orderBy('nama_kategori')->get(),
        ]);
    }
}

