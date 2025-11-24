<?php

namespace Database\Seeders;

use App\Models\Laporan;
use App\Models\LaporanDetail;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;

class LaporanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $laporan = Laporan::query()->pluck('id_laporan', 'jenis');
        $transaksi = Transaksi::query()->get();

        foreach ($laporan as $jenis => $laporanId) {
            foreach ($transaksi as $trx) {
                LaporanDetail::query()->updateOrCreate(
                    [
                        'id_laporan' => $laporanId,
                        'id_transaksi' => $trx->id_transaksi,
                    ],
                    [
                        'total_transaksi' => $trx->total_harga,
                    ]
                );
            }
        }
    }
}
