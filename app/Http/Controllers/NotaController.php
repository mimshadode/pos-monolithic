<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function index(Request $request)
    {
        $nota = Nota::with(['transaksi.pemesanan.items.produk', 'kasir'])
            ->latest('tanggal_cetak')
            ->get();

        return response()->json($nota);
    }

    public function show(Request $request, $kode_nota)
    {
        $nota = Nota::with([
            'transaksi.pemesanan.items.produk',
            'transaksi.pembayaran.metodePembayaran',
            'kasir',
        ])->findOrFail($kode_nota);

        if ($request->wantsJson()) {
            return response()->json($nota);
        }

        return view('nota.index', [
            'nota' => $nota,
        ]);
    }

    public function print($kode_nota)
    {
        $nota = Nota::with([
            'transaksi.pemesanan.items.produk',
            'transaksi.pembayaran.metodePembayaran',
            'kasir',
        ])->findOrFail($kode_nota);

        return view('nota.print', compact('nota'));
    }
}
