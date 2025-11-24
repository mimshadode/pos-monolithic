<?php

namespace Database\Seeders;

use App\Models\ItemPemesanan;
use App\Models\Pemesanan;
use App\Models\Produk;
use Illuminate\Database\Seeder;

class ItemPemesananSeeder extends Seeder
{
    public function run(): void
    {
        $produk = Produk::query()->pluck('id_produk', 'kode_produk');

        $selesaiOrder = Pemesanan::query()->where('status_pemesanan', 'selesai')->first();
        $diprosesOrder = Pemesanan::query()->where('status_pemesanan', 'diproses')->first();

        $items = [
            [
                'pemesanan' => $selesaiOrder,
                'kode_produk' => 'MKN-001',
                'qty' => 1,
                'harga_satuan' => 25000,
                'diskon' => 0,
                'catatan' => 'Pedas sedang',
            ],
            [
                'pemesanan' => $selesaiOrder,
                'kode_produk' => 'MNM-001',
                'qty' => 2,
                'harga_satuan' => 8000,
                'diskon' => 1000,
                'catatan' => null,
            ],
            [
                'pemesanan' => $diprosesOrder,
                'kode_produk' => 'SNK-001',
                'qty' => 2,
                'harga_satuan' => 12000,
                'diskon' => 0,
                'catatan' => 'Tambahkan saus',
            ],
        ];

        $totals = [];

        foreach ($items as $item) {
            $pemesanan = $item['pemesanan'];
            $productId = $produk[$item['kode_produk']] ?? null;

            if (!$pemesanan || !$productId) {
                continue;
            }

            $subtotal = ($item['qty'] * $item['harga_satuan']) - $item['diskon'];

            ItemPemesanan::query()->create([
                'id_pemesanan' => $pemesanan->id_pemesanan,
                'id_produk' => $productId,
                'qty' => $item['qty'],
                'harga_satuan' => $item['harga_satuan'],
                'diskon' => $item['diskon'],
                'subtotal' => $subtotal,
                'catatan' => $item['catatan'],
            ]);

            $totals[$pemesanan->id_pemesanan] = ($totals[$pemesanan->id_pemesanan] ?? 0) + $subtotal;
        }

        foreach ($totals as $idPemesanan => $total) {
            Pemesanan::query()->whereKey($idPemesanan)->update(['total_harga' => $total]);
        }
    }
}
