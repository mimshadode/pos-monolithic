<?php

namespace Database\Seeders;

use App\Models\MetodePembayaran;
use Illuminate\Database\Seeder;

class MetodePembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $metode = [
            ['nama_metode' => 'Cash'],
            ['nama_metode' => 'Transfer Bank'],
            ['nama_metode' => 'QRIS'],
        ];

        MetodePembayaran::query()->upsert($metode, ['nama_metode'], ['nama_metode']);
    }
}
