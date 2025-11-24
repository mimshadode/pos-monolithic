<?php

namespace Database\Seeders;

use App\Models\Pemesanan;
use App\Models\Pengguna;
use Illuminate\Database\Seeder;

class PemesananSeeder extends Seeder
{
    public function run(): void
    {
        $customers = Pengguna::query()->whereIn('username', ['pelanggan', 'kasir'])->pluck('id_user', 'username');

        $orders = [
            [
                'id_user' => $customers['pelanggan'] ?? null,
                'tanggal_pesan' => now()->subDay(),
                'total_harga' => 45000,
                'status_pemesanan' => 'selesai',
            ],
            [
                'id_user' => $customers['kasir'] ?? null,
                'tanggal_pesan' => now(),
                'total_harga' => 32000,
                'status_pemesanan' => 'diproses',
            ],
        ];

        foreach ($orders as $order) {
            if (!$order['id_user']) {
                continue;
            }

            Pemesanan::query()->updateOrCreate(
                [
                    'id_user' => $order['id_user'],
                    'tanggal_pesan' => $order['tanggal_pesan'],
                ],
                [
                    'total_harga' => $order['total_harga'],
                    'status_pemesanan' => $order['status_pemesanan'],
                ]
            );
        }
    }
}
