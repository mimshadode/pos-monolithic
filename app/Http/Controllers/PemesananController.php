<?php

namespace App\Http\Controllers;

use App\Models\ItemPemesanan;
use App\Models\Pemesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PemesananController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::with(['pengguna', 'items.produk'])
            ->latest()
            ->get();

        return response()->json($pemesanan);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'items' => 'required|array|min:1',
            'items.*.id_produk' => 'required|exists:produk,id_produk',
            'items.*.qty' => 'required|integer|min:1',
            'items.*.catatan' => 'nullable|string|max:255',
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
            $totalHarga = 0;

            // Create pemesanan
            $pemesanan = Pemesanan::create([
                'id_user' => $userId,
                'tanggal_pesan' => now(),
                'total_harga' => 0,
                'status_pemesanan' => 'baru',
            ]);

            // Process items
            foreach ($validated['items'] as $item) {
                $produk = Produk::findOrFail($item['id_produk']);

                // Check stock
                if ($produk->stok < $item['qty']) {
                    throw new \Exception("Stok {$produk->nama_produk} tidak mencukupi");
                }

                $subtotal = $produk->harga * $item['qty'];
                $totalHarga += $subtotal;

                // Create item pemesanan
                ItemPemesanan::create([
                    'id_pemesanan' => $pemesanan->id_pemesanan,
                    'id_produk' => $produk->id_produk,
                    'qty' => $item['qty'],
                    'harga_satuan' => $produk->harga,
                    'diskon' => 0,
                    'subtotal' => $subtotal,
                    'catatan' => $item['catatan'] ?? null,
                ]);

                // Update stock
                $produk->decrement('stok', $item['qty']);
                if ($produk->stok <= 0) {
                    $produk->update(['status' => 'habis']);
                }
            }

            // Update total harga pemesanan
            $pemesanan->update(['total_harga' => $totalHarga]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Pemesanan berhasil dibuat',
                'data' => $pemesanan->load(['items.produk', 'pengguna'])
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function show(Pemesanan $pemesanan)
    {
        return response()->json($pemesanan->load(['items.produk', 'pengguna', 'pembayaran']));
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        $validated = $request->validate([
            'status_pemesanan' => 'required|in:baru,diproses,selesai,dibatalkan',
        ]);

        $pemesanan->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Status pemesanan berhasil diupdate',
            'data' => $pemesanan
        ]);
    }

    public function destroy(Pemesanan $pemesanan)
    {
        // Only allow deletion if status is 'baru' or 'dibatalkan'
        if (!in_array($pemesanan->status_pemesanan, ['baru', 'dibatalkan'])) {
            return response()->json([
                'success' => false,
                'message' => 'Pemesanan tidak dapat dihapus'
            ], 400);
        }

        DB::beginTransaction();
        try {
            // Restore stock
            foreach ($pemesanan->items as $item) {
                $item->produk->increment('stok', $item->qty);
                $item->produk->update(['status' => 'tersedia']);
            }

            $pemesanan->delete();

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Pemesanan berhasil dihapus'
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