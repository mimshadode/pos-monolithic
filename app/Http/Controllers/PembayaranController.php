<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\Transaksi;
use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::with(['pemesanan', 'kasir', 'metodePembayaran'])
            ->latest('tanggal_pembayaran')
            ->get();

        return response()->json($pembayaran);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pemesanan' => 'required|exists:pemesanan,id_pemesanan',
            'id_metode_pembayaran' => 'required|exists:metode_pembayaran,id_metode_pembayaran',
            'jumlah_dibayar' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // Check if user is logged in
        $userId = session('pengguna_id');
        if (!$userId) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak terautentikasi. Silakan login kembali.'
            ], 401);
        }

        DB::beginTransaction();
        try {
            $pemesanan = Pemesanan::findOrFail($validated['id_pemesanan']);

            // Check if payment already exists
            if ($pemesanan->pembayaran) {
                throw new \Exception('Pemesanan sudah memiliki pembayaran');
            }

            $totalTagihan = $pemesanan->total_harga;
            $jumlahDibayar = $validated['jumlah_dibayar'];

            // Determine payment status
            if ($jumlahDibayar >= $totalTagihan) {
                $statusPembayaran = 'lunas';
            } elseif ($jumlahDibayar > 0) {
                $statusPembayaran = 'sebagian';
            } else {
                $statusPembayaran = 'belum_lunas';
            }

            // Create pembayaran
            $pembayaran = Pembayaran::create([
                'id_pemesanan' => $validated['id_pemesanan'],
                'id_user' => $userId,
                'id_metode_pembayaran' => $validated['id_metode_pembayaran'],
                'total_tagihan' => $totalTagihan,
                'jumlah_dibayar' => $jumlahDibayar,
                'status_pembayaran' => $statusPembayaran,
                'tanggal_pembayaran' => now(),
                'keterangan' => $validated['keterangan'] ?? null,
            ]);

            // If payment is complete, create transaction and receipt
            if ($statusPembayaran === 'lunas') {
                // Update pemesanan status
                $pemesanan->update(['status_pemesanan' => 'selesai']);

                // Create transaction
                $transaksi = Transaksi::create([
                    'kode_transaksi' => (string) Str::ulid(),
                    'id_pemesanan' => $pemesanan->id_pemesanan,
                    'id_pembayaran' => $pembayaran->id_pembayaran,
                    'tanggal_transaksi' => now(),
                    'total_harga' => $totalTagihan,
                    'status_transaksi' => 'selesai',
                ]);

                // Create nota
                $nota = Nota::create([
                    'kode_nota' => 'NOTA-' . Str::upper(Str::random(10)),
                    'id_transaksi' => $transaksi->id_transaksi,
                    'id_kasir' => session('pengguna_id'),
                    'tanggal_cetak' => now(),
                    'total_transaksi' => $totalTagihan,
                    'catatan' => 'Pembayaran lunas',
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Pembayaran berhasil diproses',
                'data' => $pembayaran->load(['pemesanan.items.produk', 'kasir', 'metodePembayaran', 'transaksi.nota'])
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function show(Pembayaran $pembayaran)
    {
        return response()->json($pembayaran->load(['pemesanan.items.produk', 'kasir', 'metodePembayaran', 'transaksi']));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $validated = $request->validate([
            'jumlah_dibayar' => 'required|numeric|min:0',
            'keterangan' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            $totalTagihan = $pembayaran->total_tagihan;
            $jumlahDibayar = $validated['jumlah_dibayar'];

            // Determine new status
            if ($jumlahDibayar >= $totalTagihan) {
                $statusPembayaran = 'lunas';
            } elseif ($jumlahDibayar > 0) {
                $statusPembayaran = 'sebagian';
            } else {
                $statusPembayaran = 'belum_lunas';
            }

            $pembayaran->update([
                'jumlah_dibayar' => $jumlahDibayar,
                'status_pembayaran' => $statusPembayaran,
                'keterangan' => $validated['keterangan'] ?? $pembayaran->keterangan,
            ]);

            // If just became lunas, create transaction
            if ($statusPembayaran === 'lunas' && !$pembayaran->transaksi) {
                $pemesanan = $pembayaran->pemesanan;
                $pemesanan->update(['status_pemesanan' => 'selesai']);

                $transaksi = Transaksi::create([
                    'kode_transaksi' => (string) Str::ulid(),
                    'id_pemesanan' => $pemesanan->id_pemesanan,
                    'id_pembayaran' => $pembayaran->id_pembayaran,
                    'tanggal_transaksi' => now(),
                    'total_harga' => $totalTagihan,
                    'status_transaksi' => 'selesai',
                ]);

                Nota::create([
                    'kode_nota' => 'NOTA-' . Str::upper(Str::random(10)),
                    'id_transaksi' => $transaksi->id_transaksi,
                    'id_kasir' => session('pengguna_id'),
                    'tanggal_cetak' => now(),
                    'total_transaksi' => $totalTagihan,
                    'catatan' => 'Pembayaran lunas',
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Pembayaran berhasil diupdate',
                'data' => $pembayaran->fresh()->load(['pemesanan', 'transaksi'])
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }
}