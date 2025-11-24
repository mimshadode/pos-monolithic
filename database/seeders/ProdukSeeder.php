<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $kategori = Kategori::query()->pluck('id_kategori', 'nama_kategori');

        $produk = [
            [
                'kode_produk' => 'MKN-001',
                'nama_produk' => 'Nasi Goreng Spesial',
                'deskripsi' => 'Nasi goreng dengan ayam dan telur',
                'harga' => 25000,
                'stok' => 50,
                'status' => 'tersedia',
                'kategori' => 'Makanan',
            ],
            [
                'kode_produk' => 'MNM-001',
                'nama_produk' => 'Es Teh Manis',
                'deskripsi' => 'Teh manis dingin',
                'harga' => 8000,
                'stok' => 100,
                'status' => 'tersedia',
                'kategori' => 'Minuman',
            ],
            [
                'kode_produk' => 'SNK-001',
                'nama_produk' => 'Keripik Singkong',
                'deskripsi' => 'Keripik singkong pedas',
                'harga' => 12000,
                'stok' => 40,
                'status' => 'tersedia',
                'kategori' => 'Snack',
            ],
        ];

        foreach ($produk as $item) {
            $idKategori = $kategori[$item['kategori']] ?? null;

            if (!$idKategori) {
                continue;
            }

            Produk::query()->updateOrCreate(
                ['kode_produk' => $item['kode_produk']],
                [
                    'nama_produk' => $item['nama_produk'],
                    'deskripsi' => $item['deskripsi'],
                    'harga' => $item['harga'],
                    'stok' => $item['stok'],
                    'status' => $item['status'],
                    'id_kategori' => $idKategori,
                ]
            );
        }
    }
}
