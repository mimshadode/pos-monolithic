<?php

namespace Database\Seeders;

use App\Models\MetodePembayaran;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use App\Models\Pengguna;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $kasirId = Pengguna::query()->where('username', 'kasir')->value('id_user');
        $metode = MetodePembayaran::query()->pluck('id_metode_pembayaran', 'nama_metode');

        $selesaiOrder = Pemesanan::query()->where('status_pemesanan', 'selesai')->with('items')->first();
        $diprosesOrder = Pemesanan::query()->where('status_pemesanan', 'diproses')->with('items')->first();

        $payments = [
            [
                'pemesanan' => $selesaiOrder,
                'jumlah_dibayar' => $selesaiOrder?->items->sum('subtotal') ?? 0,
                'status' => 'lunas',
                'metode' => 'Cash',
                'keterangan' => 'Pembayaran penuh',
            ],
            [
                'pemesanan' => $diprosesOrder,
                'jumlah_dibayar' => 10000,
                'status' => 'sebagian',
                'metode' => 'Transfer Bank',
                'keterangan' => 'DP untuk pesanan',
            ],
        ];

        foreach ($payments as $payment) {
            $pemesanan = $payment['pemesanan'];
            $metodeId = $metode[$payment['metode']] ?? null;

            if (!$pemesanan || !$kasirId || !$metodeId) {
                continue;
            }

            Pembayaran::query()->updateOrCreate(
                ['id_pemesanan' => $pemesanan->id_pemesanan],
                [
                    'id_user' => $kasirId,
                    'id_metode_pembayaran' => $metodeId,
                    'total_tagihan' => $pemesanan->items->sum('subtotal'),
                    'jumlah_dibayar' => $payment['jumlah_dibayar'],
                    'status_pembayaran' => $payment['status'],
                    'tanggal_pembayaran' => now(),
                    'keterangan' => $payment['keterangan'],
                ]
            );
        }
    }
}
