<?php

namespace Database\Seeders;

use App\Models\Nota;
use App\Models\Pengguna;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NotaSeeder extends Seeder
{
    public function run(): void
    {
        $kasirId = Pengguna::query()->where('username', 'kasir')->value('id_user');
        $transaksi = Transaksi::query()->get();

        foreach ($transaksi as $trx) {
            if (!$kasirId) {
                continue;
            }

            Nota::query()->updateOrCreate(
                ['id_transaksi' => $trx->id_transaksi],
                [
                    'kode_nota' => 'NOTA-' . Str::upper(Str::random(8)),
                    'id_kasir' => $kasirId,
                    'tanggal_cetak' => now(),
                    'total_transaksi' => $trx->total_harga,
                    'catatan' => 'Dicetak otomatis untuk transaksi seed',
                ]
            );
        }
    }
}
