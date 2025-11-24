@extends('layouts.app')

@section('title', 'Detail Pemesanan')
@section('layoutWidth', 'max-w-5xl')

@section('header')
    <div class="flex flex-wrap items-start justify-between gap-3">
        <div class="space-y-1">
            <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Detail Pemesanan</p>
            <h1 class="text-4xl font-semibold text-white">#{{ $pemesanan->id_pemesanan }}</h1>
            <div class="flex flex-wrap gap-2 text-sm text-slate-300">
                <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1">Customer: {{ $pemesanan->pengguna->username ?? '-' }}</span>
                <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1">Tanggal: {{ $pemesanan->tanggal_pesan }}</span>
                <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1 capitalize">Status: {{ $pemesanan->status_pemesanan }}</span>
                <span class="rounded-full border border-white/10 bg-white/5 px-3 py-1">
                    Pembayaran: {{ $pemesanan->pembayaran?->status_pembayaran ? str_replace('_', ' ', $pemesanan->pembayaran->status_pembayaran) : 'Belum ada' }}
                </span>
            </div>
        </div>
        <a href="{{ route('pemesanan-web.index') }}" class="inline-flex items-center gap-1 rounded-lg px-3 py-2 text-sm text-slate-200 transition hover:bg-white/5 hover:text-white">
            <span class="text-lg">←</span> Kembali
        </a>
    </div>
@endsection

@section('content')
    <section class="rounded-2xl border border-white/10 bg-slate-900/70 shadow-card overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="text-slate-400">
                <tr>
                    <th class="text-left px-6 py-3">Produk</th>
                    <th class="text-left px-6 py-3">Qty</th>
                    <th class="text-left px-6 py-3">Harga Satuan</th>
                    <th class="text-left px-6 py-3">Diskon</th>
                    <th class="text-left px-6 py-3">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemesanan->items as $item)
                    <tr class="border-t border-white/5">
                        <td class="px-6 py-3">{{ $item->produk->nama_produk ?? '-' }}</td>
                        <td class="px-6 py-3">{{ $item->qty }}</td>
                        <td class="px-6 py-3">Rp{{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                        <td class="px-6 py-3">Rp{{ number_format($item->diskon, 0, ',', '.') }}</td>
                        <td class="px-6 py-3">Rp{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr class="border-t border-white/5 text-lg font-semibold">
                    <td colspan="4" class="px-6 py-3 text-right">Total</td>
                    <td class="px-6 py-3">Rp{{ number_format($pemesanan->total_harga, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
    </section>
@endsection
