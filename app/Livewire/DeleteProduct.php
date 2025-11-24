<?php

namespace App\Livewire;

use App\Models\Produk;
use Livewire\Attributes\On;
use Livewire\Component;

class DeleteProduct extends Component
{
    public ?int $produkId = null;

    #[On('delete-product')]
    public function delete(int $id_produk): void
    {
        $this->resetValidation();

        $produk = Produk::query()->findOrFail($id_produk);
        $this->produkId = $produk->id_produk;

        if ($produk->itemPemesanan()->exists()) {
            $this->addError('produk', 'Produk tidak dapat dihapus karena sudah dipakai dalam pemesanan.');

            return;
        }

        $produk->delete();

        $this->dispatch('product-deleted');

        $this->produkId = null;
    }

    public function render()
    {
        return view('livewire.delete-product');
    }
}
