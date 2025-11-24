<?php

namespace App\Services;

use App\Models\Laporan;
use App\Models\Transaksi;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class LaporanService
{
    public function create(array $data): Laporan
    {
        return DB::transaction(function () use ($data) {
            $laporan = Laporan::query()->create([
                'periode_mulai' => $data['periode_mulai'],
                'periode_selesai' => $data['periode_selesai'],
                'jenis' => $data['jenis'],
                'keterangan' => $data['keterangan'] ?? null,
            ]);

            $transaksi = $this->fetchTransaksi($laporan->periode_mulai, $laporan->periode_selesai);
            $this->attachDetail($laporan, $transaksi);

            return $laporan->load('detail');
        });
    }

    public function update(Laporan $laporan, array $data): Laporan
    {
        return DB::transaction(function () use ($laporan, $data) {
            $laporan->fill([
                'periode_mulai' => $data['periode_mulai'] ?? $laporan->periode_mulai,
                'periode_selesai' => $data['periode_selesai'] ?? $laporan->periode_selesai,
                'jenis' => $data['jenis'] ?? $laporan->jenis,
                'keterangan' => $data['keterangan'] ?? $laporan->keterangan,
            ]);

            $laporan->save();

            if (isset($data['periode_mulai']) || isset($data['periode_selesai'])) {
                $laporan->detail()->delete();
                $transaksi = $this->fetchTransaksi($laporan->periode_mulai, $laporan->periode_selesai);
                $this->attachDetail($laporan, $transaksi);
            }

            return $laporan->load('detail');
        });
    }

    private function fetchTransaksi(string $mulai, string $selesai): Collection
    {
        return Transaksi::query()
            ->whereBetween('tanggal_transaksi', [$mulai, $selesai])
            ->where('status_transaksi', 'selesai')
            ->get();
    }

    private function attachDetail(Laporan $laporan, Collection $transaksi): void
    {
        $payload = $transaksi->map(fn (Transaksi $trx) => [
            'id_transaksi' => $trx->id_transaksi,
            'total_transaksi' => $trx->total_harga,
        ])->all();

        $laporan->detail()->createMany($payload);
    }
}
