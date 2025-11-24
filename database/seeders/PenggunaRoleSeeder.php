<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use App\Models\PenggunaRole;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PenggunaRoleSeeder extends Seeder
{
    public function run(): void
    {
        $users = Pengguna::query()->whereIn('username', ['admin', 'kasir', 'pelanggan'])->pluck('id_user', 'username');
        $roles = Role::query()->whereIn('kode_role', ['admin', 'kasir', 'customer'])->pluck('id_role', 'kode_role');

        $assignments = [
            ['username' => 'admin', 'kode_role' => 'admin'],
            ['username' => 'kasir', 'kode_role' => 'kasir'],
            ['username' => 'pelanggan', 'kode_role' => 'customer'],
        ];

        foreach ($assignments as $assignment) {
            $idUser = $users[$assignment['username']] ?? null;
            $idRole = $roles[$assignment['kode_role']] ?? null;

            if ($idUser && $idRole) {
                PenggunaRole::query()->updateOrCreate(
                    [
                        'id_user' => $idUser,
                        'id_role' => $idRole,
                    ],
                    []
                );
            }
        }
    }
}
