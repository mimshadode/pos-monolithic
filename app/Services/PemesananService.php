<?php

namespace App\Services;

use App\Models\ItemPemesanan;
use App\Models\Pemesanan;
use App\Models\Produk;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use function collect;

class PemesananService
{
    public function create(array $data): Pemesanan
    {
        return DB::transaction(function () use ($data) {
            $items = collect($data['items']);
            $produk = $this->loadProduk($items->pluck('id_produk'));

            $pemesanan = Pemesanan::query()->create([
                'id_user' => $data['id_user'],
                'tanggal_pesan' => $data['tanggal_pesan'] ?? now(),
                'status_pemesanan' => $data['status_pemesanan'] ?? 'baru',
                'total_harga' => 0,
            ]);

            $total = $this->syncItems($pemesanan, $items, $produk);
            $pemesanan->update(['total_harga' => $total]);

            return $pemesanan->load(['items', 'items.produk']);
        });
    }

    public function update(Pemesanan $pemesanan, array $data): Pemesanan
    {
        return DB::transaction(function () use ($pemesanan, $data) {
            $items = collect($data['items'] ?? []);

            if ($items->isNotEmpty()) {
                $produk = $this->loadProduk($items->pluck('id_produk'));
                $pemesanan->items()->delete();
                $total = $this->syncItems($pemesanan, $items, $produk);
                $pemesanan->total_harga = $total;
            }

            if (isset($data['status_pemesanan'])) {
                $pemesanan->status_pemesanan = $data['status_pemesanan'];
            }

            if (isset($data['tanggal_pesan'])) {
                $pemesanan->tanggal_pesan = $data['tanggal_pesan'];
            }

            $pemesanan->save();

            return $pemesanan->load(['items', 'items.produk']);
        });
    }

    private function syncItems(Pemesanan $pemesanan, Collection $items, Collection $produk): float
    {
        $total = 0;

        foreach ($items as $itemData) {
            $product = $produk->get($itemData['id_produk']);

            if (!$product) {
                throw ValidationException::withMessages([
                    'items' => ['Produk tidak ditemukan untuk salah satu item.'],
                ]);
            }

            $qty = (int) $itemData['qty'];
            $hargaSatuan = (float) $product->harga;
            $diskon = (float) ($itemData['diskon'] ?? 0);
            $maximumDiskon = $qty * $hargaSatuan;

            if ($diskon > $maximumDiskon) {
                throw ValidationException::withMessages([
                    'items' => ['Diskon tidak boleh melebihi total harga per item.'],
                ]);
            }

            $subtotal = ($qty * $hargaSatuan) - $diskon;

            ItemPemesanan::query()->create([
                'id_pemesanan' => $pemesanan->id_pemesanan,
                'id_produk' => $product->id_produk,
                'qty' => $qty,
                'harga_satuan' => $hargaSatuan,
                'diskon' => $diskon,
                'subtotal' => $subtotal,
                'catatan' => $itemData['catatan'] ?? null,
            ]);

            $total += $subtotal;
        }

        return $total;
    }

    private function loadProduk(Collection $produkIds): Collection
    {
        return Produk::query()
            ->whereIn('id_produk', $produkIds->unique()->all())
            ->get()
            ->keyBy('id_produk');
    }
}
