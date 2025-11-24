<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'email' => 'admin@pos.test',
                'username' => 'admin',
                'password_hash' => Hash::make('password'),
                'status' => 'active',
            ],
            [
                'email' => 'kasir@pos.test',
                'username' => 'kasir',
                'password_hash' => Hash::make('password'),
                'status' => 'active',
            ],
            [
                'email' => 'pelanggan@pos.test',
                'username' => 'pelanggan',
                'password_hash' => Hash::make('password'),
                'status' => 'active',
            ],
        ];

        foreach ($users as $user) {
            Pengguna::query()->updateOrCreate(
                ['email' => $user['email']],
                $user
            );
        }
    }
}
