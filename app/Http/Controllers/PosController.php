<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use App\Models\Produk;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index()
    {
        $metodePembayaran = MetodePembayaran::orderBy('nama_metode')->get();

        return view('pos.index', [
            'metodePembayaran' => $metodePembayaran,
            'cashMethodId' => $metodePembayaran->firstWhere('nama_metode', 'Cash')?->id_metode_pembayaran,
        ]);
    }

    public function getProducts()
    {
        $products = Produk::with('kategori')
            ->where('status', 'tersedia')
            ->where('stok', '>', 0)
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id_produk,
                    'kode' => $product->kode_produk,
                    'name' => $product->nama_produk,
                    'description' => $product->deskripsi,
                    'price' => (float) $product->harga,
                    'stock' => $product->stok,
                    'category' => $product->kategori->nama_kategori ?? '-',
                    'image' => asset('img/placeholder.png'), // Default image
                ];
            });

        return response()->json($products);
    }
}
