<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Web Routes
    public function webIndex()
    {
        $produk = Produk::with('kategori')->latest()->get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }

    public function webStore(Request $request)
    {
        $validated = $request->validate([
            'kode_produk' => 'required|string|max:20|unique:produk,kode_produk',
            'nama_produk' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        $validated['status'] = $validated['stok'] > 0 ? 'tersedia' : 'habis';

        Produk::create($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Produk $produk)
    {
        $kategori = Kategori::all();
        return view('produk.edit', compact('produk', 'kategori'));
    }

    public function webUpdate(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'kode_produk' => 'required|string|max:20|unique:produk,kode_produk,' . $produk->id_produk . ',id_produk',
            'nama_produk' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        $validated['status'] = $validated['stok'] > 0 ? 'tersedia' : 'habis';

        $produk->update($validated);

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil diupdate!');
    }

    public function webDestroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('products.index')
            ->with('success', 'Produk berhasil dihapus!');
    }

    // API Routes
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        return response()->json($produk);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_produk' => 'required|string|max:20|unique:produk,kode_produk',
            'nama_produk' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        $validated['status'] = $validated['stok'] > 0 ? 'tersedia' : 'habis';

        $produk = Produk::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan',
            'data' => $produk->load('kategori')
        ], 201);
    }

    public function show(Produk $produk)
    {
        return response()->json($produk->load('kategori'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'kode_produk' => 'required|string|max:20|unique:produk,kode_produk,' . $produk->id_produk . ',id_produk',
            'nama_produk' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'id_kategori' => 'required|exists:kategori,id_kategori',
        ]);

        $validated['status'] = $validated['stok'] > 0 ? 'tersedia' : 'habis';

        $produk->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diupdate',
            'data' => $produk->load('kategori')
        ]);
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus'
        ]);
    }
}