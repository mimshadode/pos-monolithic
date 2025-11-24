<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call([
            RolesSeeder::class,
            PenggunaSeeder::class,
            PenggunaRoleSeeder::class,
            KategoriSeeder::class,
            ProdukSeeder::class,
            MetodePembayaranSeeder::class,
            PemesananSeeder::class,
            ItemPemesananSeeder::class,
            PembayaranSeeder::class,
            TransaksiSeeder::class,
            NotaSeeder::class,
            LaporanSeeder::class,
            LaporanDetailSeeder::class,
        ]);
    }
}
