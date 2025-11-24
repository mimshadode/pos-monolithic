<?php

namespace Database\Seeders;

use App\Models\Laporan;
use Illuminate\Database\Seeder;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        $reports = [
            [
                'periode_mulai' => now()->startOfDay()->subDay()->toDateString(),
                'periode_selesai' => now()->startOfDay()->toDateString(),
                'jenis' => 'harian',
                'keterangan' => 'Penjualan dua hari terakhir',
            ],
            [
                'periode_mulai' => now()->startOfWeek()->toDateString(),
                'periode_selesai' => now()->endOfWeek()->toDateString(),
                'jenis' => 'mingguan',
                'keterangan' => 'Rekap minggu berjalan',
            ],
        ];

        foreach ($reports as $report) {
            Laporan::query()->updateOrCreate(
                [
                    'periode_mulai' => $report['periode_mulai'],
                    'periode_selesai' => $report['periode_selesai'],
                    'jenis' => $report['jenis'],
                ],
                [
                    'keterangan' => $report['keterangan'],
                ]
            );
        }
    }
}
