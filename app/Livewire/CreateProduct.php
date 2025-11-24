<?php

namespace App\Livewire;

use App\Models\Kategori;
use App\Models\Produk;
use Livewire\Component;

class CreateProduct extends Component
{
    public string $kode_produk = '';
    public string $nama_produk = '';
    public ?string $deskripsi = null;
    public float|int|null $harga = null;
    public int|null $stok = null;
    public string $status = 'tersedia';
    public int|string|null $id_kategori = null;
    public ?string $successMessage = null;

    protected array $rules = [
        'kode_produk' => ['required', 'string', 'max:50', 'unique:produk,kode_produk'],
        'nama_produk' => ['required', 'string', 'max:255'],
        'deskripsi' => ['nullable', 'string'],
        'harga' => ['required', 'numeric', 'min:0'],
        'stok' => ['required', 'integer', 'min:0'],
        'status' => ['required', 'in:tersedia,habis'],
        'id_kategori' => ['required', 'exists:kategori,id_kategori'],
    ];

    public function createProduct(): void
    {
        $this->status = ($this->stok ?? 0) > 0 ? 'tersedia' : 'habis';

        $validated = $this->validate();

        Produk::create($validated);

        $this->resetForm();

        $this->successMessage = 'Produk berhasil disimpan.';

        $this->dispatch('product-created');
    }

    protected function resetForm(): void
    {
        $this->reset([
            'kode_produk',
            'nama_produk',
            'deskripsi',
            'harga',
            'stok',
            'status',
            'id_kategori',
            'successMessage',
        ]);

        $this->status = 'tersedia';
    }

    public function render()
    {
        return view('livewire.create-product', [
            'kategoriList' => Kategori::orderBy('nama_kategori')->get(),
        ]);
    }
}
