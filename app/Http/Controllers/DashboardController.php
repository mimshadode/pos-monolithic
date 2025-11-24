<?php

namespace App\Http\Controllers;

use App\Models\ItemPemesanan;
use App\Models\Kategori;
use App\Models\Laporan;
use App\Models\Nota;
use App\Models\Pemesanan;
use App\Models\Pembayaran;
use App\Models\Pengguna;
use App\Models\Produk;
use App\Models\Role;
use App\Models\Transaksi;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('dashboard', [
            'roles' => Role::query()->orderBy('kode_role')->get(),
            'users' => Pengguna::query()->latest('created_at')->take(5)->get(),
            'kategori' => Kategori::query()->orderBy('nama_kategori')->get(),
            'produk' => Produk::query()->with('kategori')->latest('created_at')->take(5)->get(),
            'pemesanan' => Pemesanan::query()->with(['pengguna', 'items'])->latest('tanggal_pesan')->take(5)->get(),
            'itemPemesanan' => ItemPemesanan::query()->with(['pemesanan', 'produk'])->latest('created_at')->take(5)->get(),
            'pembayaran' => Pembayaran::query()->with(['pemesanan', 'kasir', 'metodePembayaran'])->latest('tanggal_pembayaran')->take(5)->get(),
            'transaksi' => Transaksi::query()->with(['pemesanan', 'pembayaran'])->latest('tanggal_transaksi')->take(5)->get(),
            'nota' => Nota::query()->with(['transaksi', 'kasir'])->latest('tanggal_cetak')->take(5)->get(),
            'laporan' => Laporan::query()->with('detail')->latest('periode_mulai')->take(5)->get(),
            'metrics' => [
                'pengguna' => Pengguna::query()->count(),
                'produk' => Produk::query()->count(),
                'pemesanan' => Pemesanan::query()->count(),
                'pembayaran' => Pembayaran::query()->count(),
                'transaksi' => Transaksi::query()->count(),
            ],
        ]);
    }
}
