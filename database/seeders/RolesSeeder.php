<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            [
                'kode_role' => 'admin',
                'nama_role' => 'Administrator',
                'keterangan' => 'Mengelola seluruh sistem POS',
            ],
            [
                'kode_role' => 'kasir',
                'nama_role' => 'Kasir',
                'keterangan' => 'Memproses pemesanan dan pembayaran',
            ],
            [
                'kode_role' => 'customer',
                'nama_role' => 'Pelanggan',
                'keterangan' => 'Pengguna untuk akses pelanggan',
            ],
        ];

        Role::query()->upsert($roles, ['kode_role'], ['nama_role', 'keterangan']);
    }
}
