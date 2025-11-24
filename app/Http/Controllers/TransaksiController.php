<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::with(['pemesanan.items.produk', 'pembayaran.metodePembayaran', 'nota']);

        // Filter by date range
        if ($request->has('start_date')) {
            $query->whereDate('tanggal_transaksi', '>=', $request->start_date);
        }

        if ($request->has('end_date')) {
            $query->whereDate('tanggal_transaksi', '<=', $request->end_date);
        }

        // Filter by status
        if ($request->has('status')) {
            $query->where('status_transaksi', $request->status);
        }

        $transaksi = $query->latest('tanggal_transaksi')->get();

        return response()->json($transaksi);
    }

    public function show(Transaksi $transaksi)
    {
        return response()->json($transaksi->load([
            'pemesanan.items.produk',
            'pemesanan.pengguna',
            'pembayaran.metodePembayaran',
            'pembayaran.kasir',
            'nota.kasir'
        ]));
    }

    public function webIndex()
    {
        $transaksi = Transaksi::with(['pemesanan', 'pembayaran', 'nota'])
            ->latest('tanggal_transaksi')
            ->paginate(20);

        return view('transaksi.index', compact('transaksi'));
    }
}