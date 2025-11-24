<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProdukWebController extends Controller
{
    public function index(): View
    {
        $produk = Produk::query()->with('kategori')->latest('created_at')->paginate(10);

        return view('produk.index', compact('produk'));
    }

    public function create(): View
    {
        return view('produk.create', [
            'kategori' => Kategori::query()->orderBy('nama_kategori')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        Produk::create($data);

        return redirect()->route('produk.index')->with('status', 'Produk berhasil dibuat.');
    }

    public function edit(Produk $produk): View
    {
        return view('produk.edit', [
            'produk' => $produk,
            'kategori' => Kategori::query()->orderBy('nama_kategori')->get(),
        ]);
    }

    public function update(Request $request, Produk $produk): RedirectResponse
    {
        $data = $this->validatedData($request, $produk->id_produk);

        $produk->update($data);

        return redirect()->route('produk.index')->with('status', 'Produk berhasil diperbarui.');
    }

    public function destroy(Produk $produk): RedirectResponse
    {
        if ($produk->itemPemesanan()->exists()) {
            return redirect()->route('produk.index')->withErrors([
                'produk' => 'Produk tidak dapat dihapus karena sudah digunakan dalam pemesanan.',
            ]);
        }

        $produk->delete();

        return redirect()->route('produk.index')->with('status', 'Produk berhasil dihapus.');
    }

    private function validatedData(Request $request, ?int $ignoreId = null): array
    {
        $uniqueRule = Rule::unique('produk', 'kode_produk');

        if ($ignoreId) {
            $uniqueRule = $uniqueRule->ignore($ignoreId, 'id_produk');
        }

        return $request->validate([
            'kode_produk' => ['required', 'string', 'max:20', $uniqueRule],
            'nama_produk' => ['required', 'string', 'max:100'],
            'deskripsi' => ['nullable', 'string'],
            'harga' => ['required', 'numeric', 'min:0'],
            'stok' => ['required', 'integer', 'min:0'],
            'status' => ['required', 'in:tersedia,habis'],
            'id_kategori' => ['required', 'integer', 'exists:kategori,id_kategori'],
        ]);
    }
}
