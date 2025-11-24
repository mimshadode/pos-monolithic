<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        $payments = Pembayaran::query()
            ->where('status_pembayaran', 'lunas')
            ->get();

        foreach ($payments as $pembayaran) {
            Transaksi::query()->updateOrCreate(
                [
                    'id_pemesanan' => $pembayaran->id_pemesanan,
                    'id_pembayaran' => $pembayaran->id_pembayaran,
                ],
                [
                    'kode_transaksi' => (string) Str::ulid(),
                    'tanggal_transaksi' => now(),
                    'total_harga' => $pembayaran->total_tagihan,
                    'status_transaksi' => 'selesai',
                ]
            );
        }
    }
}
