<?php

namespace App\Services;

use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class PembayaranService
{
    public function create(array $data): Pembayaran
    {
        return DB::transaction(function () use ($data) {
            /** @var Pemesanan $pemesanan */
            $pemesanan = Pemesanan::query()
                ->with('items')
                ->lockForUpdate()
                ->findOrFail($data['id_pemesanan']);

            if ($pemesanan->pembayaran) {
                throw ValidationException::withMessages([
                    'id_pemesanan' => ['Pemesanan ini sudah memiliki pembayaran.'],
                ]);
            }

            $totalTagihan = $this->calculateTotalTagihan($pemesanan);

            $status = $this->resolveStatus(
                $data['status_pembayaran'] ?? null,
                $totalTagihan,
                (float) $data['jumlah_dibayar']
            );

            $pembayaran = Pembayaran::query()->create([
                'id_pemesanan' => $pemesanan->id_pemesanan,
                'id_user' => $data['id_user'],
                'id_metode_pembayaran' => $data['id_metode_pembayaran'],
                'total_tagihan' => $totalTagihan,
                'jumlah_dibayar' => $data['jumlah_dibayar'],
                'status_pembayaran' => $status,
                'tanggal_pembayaran' => $data['tanggal_pembayaran'] ?? now(),
                'keterangan' => $data['keterangan'] ?? null,
            ]);

            $this->syncStatusPemesanan($pemesanan, $status);

            if ($status === 'lunas') {
                $this->createTransaksi($pemesanan, $pembayaran);
            }

            return $pembayaran->load(['pemesanan', 'transaksi']);
        });
    }

    public function update(Pembayaran $pembayaran, array $data): Pembayaran
    {
        return DB::transaction(function () use ($pembayaran, $data) {
            $pemesanan = $pembayaran->pemesanan()->with('items')->lockForUpdate()->firstOrFail();
            $totalTagihan = $this->calculateTotalTagihan($pemesanan);

            $jumlahDibayar = $data['jumlah_dibayar'] ?? $pembayaran->jumlah_dibayar;

            $status = $this->resolveStatus(
                $data['status_pembayaran'] ?? $pembayaran->status_pembayaran,
                $totalTagihan,
                (float) $jumlahDibayar
            );

            $pembayaran->fill([
                'id_user' => $data['id_user'] ?? $pembayaran->id_user,
                'id_metode_pembayaran' => $data['id_metode_pembayaran'] ?? $pembayaran->id_metode_pembayaran,
                'jumlah_dibayar' => $jumlahDibayar,
                'status_pembayaran' => $status,
                'tanggal_pembayaran' => $data['tanggal_pembayaran'] ?? $pembayaran->tanggal_pembayaran,
                'keterangan' => $data['keterangan'] ?? $pembayaran->keterangan,
            ]);

            $pembayaran->total_tagihan = $totalTagihan;
            $pembayaran->save();

            $this->syncStatusPemesanan($pemesanan, $status);

            if ($status === 'lunas' && !$pembayaran->transaksi) {
                $this->createTransaksi($pemesanan, $pembayaran);
            }

            return $pembayaran->load(['pemesanan', 'transaksi']);
        });
    }

    private function calculateTotalTagihan(Pemesanan $pemesanan): float
    {
        $total = (float) $pemesanan->items->sum('subtotal');

        if ($total <= 0) {
            throw ValidationException::withMessages([
                'id_pemesanan' => ['Pemesanan belum memiliki item yang valid.'],
            ]);
        }

        if ($pemesanan->total_harga != $total) {
            $pemesanan->update(['total_harga' => $total]);
        }

        return $total;
    }

    private function resolveStatus(?string $status, float $totalTagihan, float $jumlahDibayar): string
    {
        if ($jumlahDibayar <= 0) {
            return 'belum_lunas';
        }

        if ($jumlahDibayar >= $totalTagihan) {
            return 'lunas';
        }

        return $status === 'belum_lunas' ? 'belum_lunas' : 'sebagian';
    }

    private function syncStatusPemesanan(Pemesanan $pemesanan, string $statusPembayaran): void
    {
        if ($statusPembayaran === 'lunas') {
            $pemesanan->status_pemesanan = 'selesai';
        } elseif ($statusPembayaran === 'sebagian' && $pemesanan->status_pemesanan === 'baru') {
            $pemesanan->status_pemesanan = 'diproses';
        }

        $pemesanan->save();
    }

    private function createTransaksi(Pemesanan $pemesanan, Pembayaran $pembayaran): Transaksi
    {
        $produk = $this->lockProdukStok($pemesanan);

        foreach ($pemesanan->items as $item) {
            $product = $produk->get($item->id_produk);

            if (!$product) {
                throw ValidationException::withMessages([
                    'items' => ['Produk tidak ditemukan ketika membuat transaksi.'],
                ]);
            }

            if ($product->stok < $item->qty) {
                throw ValidationException::withMessages([
                    'stok' => ["Stok {$product->nama_produk} tidak mencukupi."],
                ]);
            }
        }

        foreach ($pemesanan->items as $item) {
            $product = $produk->get($item->id_produk);
            $product->stok = $product->stok - $item->qty;
            $product->status = $product->stok > 0 ? 'tersedia' : 'habis';
            $product->save();
        }

        $transaksi = Transaksi::query()->create([
            'kode_transaksi' => (string) Str::ulid(),
            'id_pemesanan' => $pemesanan->id_pemesanan,
            'id_pembayaran' => $pembayaran->id_pembayaran,
            'tanggal_transaksi' => now(),
            'total_harga' => $pembayaran->total_tagihan,
            'status_transaksi' => 'selesai',
        ]);

        return $transaksi;
    }

    private function lockProdukStok(Pemesanan $pemesanan): Collection
    {
        $produkIds = $pemesanan->items->pluck('id_produk')->unique()->all();

        return Produk::query()
            ->whereIn('id_produk', $produkIds)
            ->lockForUpdate()
            ->get()
            ->keyBy('id_produk');
    }
}
