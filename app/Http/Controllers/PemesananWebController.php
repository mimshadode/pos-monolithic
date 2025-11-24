<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pengguna;
use App\Models\Kategori;
use App\Models\Produk;
use App\Services\PemesananService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class PemesananWebController extends Controller
{
    public function __construct(private PemesananService $pemesananService)
    {
    }

    public function index(): View
    {
        $pemesanan = Pemesanan::query()
            ->with(['pengguna', 'items.produk', 'pembayaran'])
            ->latest('tanggal_pesan')
            ->paginate(10);

        return view('pemesanan.index', compact('pemesanan'));
    }

    public function create(): View
    {
        return view('pemesanan.create', [
            'customers' => Pengguna::query()->where('status', 'active')->orderBy('username')->get(),
            'produk' => Produk::query()->where('status', 'tersedia')->orderBy('nama_produk')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);

        $this->pemesananService->create($data);

        return redirect()->route('pemesanan-web.index')->with('status', 'Pemesanan berhasil dibuat.');
    }

    public function show(Pemesanan $pemesanan): View
    {
        $pemesanan->load(['pengguna', 'items.produk', 'pembayaran']);

        return view('pemesanan.show', compact('pemesanan'));
    }

    public function edit(Pemesanan $pemesanan): View
    {
        $pemesanan->load(['items.produk', 'pengguna']);

        return view('pemesanan.edit', [
            'pemesanan' => $pemesanan,
            'customers' => Pengguna::query()->where('status', 'active')->orderBy('username')->get(),
            'produk' => Produk::query()->where('status', 'tersedia')->orderBy('nama_produk')->get(),
            'statusOptions' => ['baru', 'diproses', 'selesai', 'dibatalkan'],
        ]);
    }

    public function update(Request $request, Pemesanan $pemesanan): RedirectResponse
    {
        $data = $this->validatedData($request, true);
        $data['status_pemesanan'] = $data['status_pemesanan'] ?? $pemesanan->status_pemesanan;

        $this->pemesananService->update($pemesanan, $data);

        return redirect()->route('pemesanan-web.index')->with('status', 'Pemesanan berhasil diperbarui.');
    }

    public function destroy(Pemesanan $pemesanan): RedirectResponse
    {
        if ($pemesanan->status_pemesanan === 'selesai') {
            throw ValidationException::withMessages([
                'pemesanan' => ['Pemesanan yang sudah selesai tidak dapat dihapus.'],
            ]);
        }

        $pemesanan->delete();

        return redirect()->route('pemesanan-web.index')->with('status', 'Pemesanan berhasil dihapus.');
    }

    public function pos(): View
    {
        return view('pemesanan.pos', [
            'produk' => Produk::query()->where('status', 'tersedia')->orderBy('nama_produk')->get(),
            'customers' => Pengguna::query()->where('status', 'active')->orderBy('username')->get(),
            'kategori' => Kategori::query()->orderBy('nama_kategori')->get(),
            'pemesanan' => Pemesanan::query()
                ->with(['pengguna'])
                ->latest('tanggal_pesan')
                ->get(),
        ]);
    }

    private function validatedData(Request $request, bool $isUpdate = false): array
    {
        $rules = [
            'id_user' => ['required', 'integer', 'exists:pengguna,id_user'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.id_produk' => ['required', 'integer', 'exists:produk,id_produk'],
            'items.*.qty' => ['required', 'integer', 'min:1'],
            'items.*.diskon' => ['nullable', 'numeric', 'min:0'],
            'items.*.catatan' => ['nullable', 'string', 'max:255'],
        ];

        if ($isUpdate) {
            $rules['status_pemesanan'] = ['nullable', 'in:baru,diproses,selesai,dibatalkan'];
        }

        $data = $request->validate($rules);

        $data['items'] = collect($data['items'])
            ->map(fn ($item) => [
                'id_produk' => (int) $item['id_produk'],
                'qty' => (int) $item['qty'],
                'diskon' => (float) ($item['diskon'] ?? 0),
                'catatan' => $item['catatan'] ?? null,
            ])->all();

        return $data;
    }
}
