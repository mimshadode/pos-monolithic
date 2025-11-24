<?php
namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\LaporanDetail;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $query = Laporan::with('detail.transaksi');

        if ($request->has('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        $laporan = $query->latest('periode_mulai')->get();

        return response()->json($laporan);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'periode_mulai' => 'required|date',
            'periode_selesai' => 'required|date|after_or_equal:periode_mulai',
            'jenis' => 'required|in:harian,mingguan,bulanan',
            'keterangan' => 'nullable|string|max:255',
        ]);

        DB::beginTransaction();
        try {
            // Create laporan
            $laporan = Laporan::create($validated);

            // Get transactions in period
            $transaksi = Transaksi::whereBetween('tanggal_transaksi', [
                $validated['periode_mulai'],
                $validated['periode_selesai']
            ])->where('status_transaksi', 'selesai')->get();

            // Create detail
            foreach ($transaksi as $trx) {
                LaporanDetail::create([
                    'id_laporan' => $laporan->id_laporan,
                    'id_transaksi' => $trx->id_transaksi,
                    'total_transaksi' => $trx->total_harga,
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Laporan berhasil dibuat',
                'data' => $laporan->load('detail.transaksi')
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function show(Laporan $laporan)
    {
        return response()->json($laporan->load('detail.transaksi.pemesanan.items.produk'));
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();

        return response()->json([
            'success' => true,
            'message' => 'Laporan berhasil dihapus'
        ]);
    }

    public function webIndex()
    {
        $laporan = Laporan::with('detail')->latest('periode_mulai')->paginate(10);
        return view('reports.index', compact('laporan'));
    }
}