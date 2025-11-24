@extends('layouts.app')

@section('title', 'Pemesanan')
@section('layoutWidth', 'max-w-6xl')

@section('header')
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Operasional</p>
            <h1 class="text-4xl font-semibold text-white">Pemesanan</h1>
            <p class="text-slate-300 max-w-2xl">Kelola order yang masuk sebelum dilakukan pembayaran.</p>
        </div>
        <a href="{{ route('pemesanan-web.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-primary px-4 py-2 text-sm font-semibold text-slate-900 shadow-glow transition hover:-translate-y-0.5 hover:bg-primary/90">
            Buat Pemesanan
        </a>
    </div>
@endsection

@section('content')
    <section class="rounded-2xl border border-white/10 bg-slate-900/70 shadow-card overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="text-slate-400">
                    <tr>
                        <th class="text-left px-6 py-3">ID</th>
                        <th class="text-left px-6 py-3">Customer</th>
                        <th class="text-left px-6 py-3">Tanggal</th>
                        <th class="text-left px-6 py-3">Item</th>
                        <th class="text-left px-6 py-3">Total Harga</th>
                        <th class="text-left px-6 py-3">Status</th>
                        <th class="text-left px-6 py-3">Pembayaran</th>
                        <th class="text-left px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pemesanan as $order)
                        <tr class="border-t border-white/5">
                            <td class="px-6 py-3 font-mono text-slate-100">#{{ $order->id_pemesanan }}</td>
                            <td class="px-6 py-3">{{ $order->pengguna->username ?? '-' }}</td>
                            <td class="px-6 py-3 text-slate-400">{{ $order->tanggal_pesan }}</td>
                            <td class="px-6 py-3 text-slate-300">{{ $order->items->sum('qty') }} item</td>
                            <td class="px-6 py-3">Rp{{ number_format($order->total_harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-3">
                                <span class="inline-flex items-center gap-2 rounded-full bg-indigo-500/10 px-3 py-1 text-xs font-semibold text-indigo-100 capitalize">
                                    <span class="size-1.5 rounded-full bg-indigo-300"></span>
                                    {{ $order->status_pemesanan }}
                                </span>
                            </td>
                            <td class="px-6 py-3 text-slate-200">
                                {{ $order->pembayaran?->status_pembayaran ? str_replace('_', ' ', $order->pembayaran->status_pembayaran) : 'Belum ada' }}
                            </td>
                            <td class="px-6 py-3">
                                <div class="flex flex-wrap items-center gap-3 text-xs">
                                    <a href="{{ route('pemesanan-web.show', $order) }}" class="text-indigo-200 underline decoration-dotted hover:text-white">Detail</a>
                                    <a href="{{ route('pemesanan-web.edit', $order) }}" class="text-sky-200 underline decoration-dotted hover:text-white">Edit</a>
                                    <form action="{{ route('pemesanan-web.destroy', $order) }}" method="POST" onsubmit="return confirm('Hapus pemesanan ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-rose-200 underline decoration-dotted hover:text-white">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8" class="px-6 py-6 text-center text-slate-500">Belum ada pemesanan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-white/5">
            {{ $pemesanan->links('pagination::bootstrap-4') }}
        </div>
    </section>
@endsection
