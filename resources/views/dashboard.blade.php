@extends('layouts.app')

@section('title', 'Dashboard')

@section('sidebar')
    @php
        $menus = [
            ['label' => 'Dashboard', 'href' => route('dashboard'), 'active' => request()->routeIs('dashboard')],
            ['label' => 'Produk', 'href' => route('produk.index'), 'active' => request()->is('produk*')],
            ['label' => 'Pemesanan', 'href' => route('pemesanan-web.index'), 'active' => request()->is('pemesanan-web*')],
            ['label' => 'Roles', 'href' => route('roles.index'), 'active' => request()->routeIs('roles.index')],
        ];
    @endphp
    <div class="space-y-4">
        <div class="rounded-xl border border-slate-200 bg-white px-3 py-2 shadow-inner shadow-slate-100">
            <p class="text-[11px] uppercase tracking-[0.2em] text-slate-500">Menu</p>
            <p class="text-sm font-semibold text-slate-900">Navigasi</p>
        </div>
        <nav class="space-y-2">
            @foreach ($menus as $menu)
                <a
                    href="{{ $menu['href'] }}"
                    class="flex items-center justify-between rounded-xl px-3 py-2 text-sm font-medium transition @if($menu['active']) bg-primary text-slate-950 shadow-glow @else border border-slate-200 bg-white text-slate-700 hover:border-slate-300 hover:bg-slate-50 hover:text-slate-900 @endif"
                >
                    <span>{{ $menu['label'] }}</span>
                    @if ($menu['active'])
                        <span class="text-xs font-semibold uppercase tracking-[0.12em]">Aktif</span>
                    @endif
                </a>
            @endforeach
        </nav>
        <div class="rounded-2xl border border-indigo-200 bg-indigo-50 p-4 text-sm text-indigo-900 shadow-md">
            <p class="text-[11px] uppercase tracking-[0.14em] text-indigo-700">Quick Tips</p>
            <p class="mt-1 leading-relaxed">Gunakan menu kiri untuk berpindah antar modul, lalu tambah data langsung dari tombol utama di setiap halaman.</p>
        </div>
    </div>
@endsection

@section('header')
    <div class="flex flex-wrap items-start justify-between gap-4">
        <div class="space-y-3">
            <div class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-3 py-1 text-[12px] uppercase tracking-[0.22em] text-slate-500">
                <span class="size-2 rounded-full bg-emerald-500 shadow-[0_0_0_6px_rgba(52,211,153,0.12)]"></span>
                POS Monolithic
            </div>
            <div>
                <h1 class="text-4xl font-semibold text-slate-900">Data Dashboard</h1>
                <p class="text-slate-600 mt-2 max-w-3xl">
                    Tampilan read-only untuk seluruh model utama. Gunakan sebagai sanity check setelah menjalankan migrasi dan seeder.
                </p>
            </div>
            <div class="flex flex-wrap items-center gap-3 text-sm text-slate-600">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-1 rounded-lg px-3 py-2 transition hover:bg-slate-100 hover:text-slate-900">
                    <span class="text-lg">←</span>
                    Dokumentasi API
                </a>
                <span class="text-slate-400">•</span>
                <code class="rounded-lg border border-slate-200 bg-white px-3 py-1 text-xs text-slate-800 shadow-inner shadow-slate-100">php artisan migrate --seed</code>
            </div>
        </div>
        <div class="rounded-2xl border border-indigo-200 bg-indigo-50 px-4 py-3 text-sm text-indigo-900 shadow-md">
            <p class="text-[11px] uppercase tracking-[0.14em] text-indigo-700">Snapshot</p>
            <p class="text-3xl font-semibold leading-tight">{{ number_format(($metrics['transaksi'] ?? 0) + ($metrics['pemesanan'] ?? 0)) }}</p>
            <p class="text-indigo-700">Total transaksi & pemesanan</p>
        </div>
    </div>
@endsection

@section('content')
    <section class="grid gap-4 md:grid-cols-5">
        @php
            $metricTitles = [
                'pengguna' => 'Pengguna',
                'produk' => 'Produk',
                'pemesanan' => 'Pemesanan',
                'pembayaran' => 'Pembayaran',
                'transaksi' => 'Transaksi',
            ];
        @endphp

        @foreach ($metricTitles as $key => $label)
            <div class="rounded-2xl border border-slate-200 bg-white px-4 py-5 shadow-lg">
                <p class="text-xs uppercase tracking-[0.16em] text-slate-500">{{ $label }}</p>
                <p class="mt-2 text-3xl font-semibold text-slate-900">{{ number_format($metrics[$key] ?? 0) }}</p>
                <p class="text-xs text-slate-500">total records</p>
            </div>
        @endforeach
    </section>

    <section class="grid gap-6 lg:grid-cols-2">
        <div class="rounded-2xl border border-slate-200 bg-white shadow-lg">
            <div class="border-b border-slate-100 px-6 py-4">
                <h2 class="text-xl font-semibold text-slate-900">Pengguna & Roles</h2>
                <p class="text-sm text-slate-600">Roles dan 5 pengguna terbaru.</p>
            </div>
            <div class="grid divide-y divide-slate-100 lg:grid-cols-2 lg:divide-y-0 lg:divide-x">
                <div class="p-6 space-y-3">
                    <p class="text-xs uppercase tracking-[0.2em] text-slate-500">Roles</p>
                    <ul class="space-y-2">
                        @forelse ($roles as $role)
                            <li class="flex items-start justify-between rounded-xl border border-slate-200 bg-slate-50 px-3 py-2">
                                <div>
                                    <p class="text-sm font-semibold text-slate-900">{{ strtoupper($role->kode_role) }}</p>
                                    <p class="text-xs text-slate-500">{{ $role->nama_role }}</p>
                                </div>
                                <span class="text-[11px] text-slate-500">{{ $role->keterangan }}</span>
                            </li>
                        @empty
                            <p class="text-sm text-slate-500">Belum ada data role.</p>
                        @endforelse
                    </ul>
                </div>
                <div class="p-6 overflow-x-auto">
                    <p class="text-xs uppercase tracking-[0.2em] text-slate-500 mb-3">Pengguna</p>
                    <table class="w-full text-sm">
                        <thead class="text-slate-500">
                            <tr>
                                <th class="text-left pb-2">Username</th>
                                <th class="text-left pb-2">Email</th>
                                <th class="text-left pb-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr class="border-t border-slate-100">
                                    <td class="py-2 font-mono text-slate-900">{{ $user->username }}</td>
                                    <td class="py-2 text-slate-600">{{ $user->email }}</td>
                                    <td class="py-2">
                                        <span class="inline-flex items-center gap-1 rounded-full bg-emerald-100 px-3 py-1 text-xs font-semibold text-emerald-800 capitalize">
                                            <span class="size-1.5 rounded-full bg-emerald-500"></span>
                                            {{ $user->status }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="py-4 text-center text-slate-500">Belum ada pengguna.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white shadow-lg">
            <div class="border-b border-slate-100 px-6 py-4">
                <h2 class="text-xl font-semibold text-slate-900">Pemesanan</h2>
                <p class="text-sm text-slate-600">5 terakhir dengan ringkasan qty.</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-slate-500">
                        <tr>
                            <th class="text-left px-6 py-3">ID</th>
                            <th class="text-left px-6 py-3">Customer</th>
                            <th class="text-left px-6 py-3">Item</th>
                            <th class="text-left px-6 py-3">Total</th>
                            <th class="text-left px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pemesanan as $order)
                            <tr class="border-t border-slate-100">
                                <td class="px-6 py-3 font-mono text-slate-900">#{{ $order->id_pemesanan }}</td>
                                <td class="px-6 py-3">{{ $order->pengguna->username ?? '-' }}</td>
                                <td class="px-6 py-3 text-slate-600">{{ $order->items->sum('qty') }} item</td>
                                <td class="px-6 py-3">Rp{{ number_format($order->total_harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-3">
                                    <span class="inline-flex items-center gap-2 rounded-full bg-sky-100 px-3 py-1 text-xs font-semibold text-sky-800 capitalize">
                                        <span class="size-1.5 rounded-full bg-sky-500"></span>
                                        {{ str_replace('_', ' ', $order->status_pemesanan) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-6 py-4 text-center text-slate-500">Belum ada pemesanan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="grid gap-6 lg:grid-cols-2">
        <div class="rounded-2xl border border-slate-200 bg-white shadow-lg">
            <div class="border-b border-slate-100 px-6 py-4">
                <h2 class="text-xl font-semibold text-slate-900">Produk</h2>
                <p class="text-sm text-slate-600">5 produk terbaru.</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-slate-500">
                        <tr>
                            <th class="text-left px-6 py-3">Kode</th>
                            <th class="text-left px-6 py-3">Nama</th>
                            <th class="text-left px-6 py-3">Kategori</th>
                            <th class="text-left px-6 py-3">Harga</th>
                            <th class="text-left px-6 py-3">Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produk as $item)
                            <tr class="border-t border-slate-100">
                                <td class="px-6 py-3 font-mono text-slate-900">{{ $item->kode_produk }}</td>
                                <td class="px-6 py-3">{{ $item->nama_produk }}</td>
                                <td class="px-6 py-3 text-slate-600">{{ $item->kategori->nama_kategori ?? '-' }}</td>
                                <td class="px-6 py-3">Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-3">{{ $item->stok }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-6 py-4 text-center text-slate-500">Belum ada produk.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white shadow-lg">
            <div class="border-b border-slate-100 px-6 py-4">
                <h2 class="text-xl font-semibold text-slate-900">Pembayaran</h2>
                <p class="text-sm text-slate-600">Progress checkout terbaru.</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-slate-500">
                        <tr>
                            <th class="text-left px-6 py-3">ID</th>
                            <th class="text-left px-6 py-3">Pemesanan</th>
                            <th class="text-left px-6 py-3">Kasir</th>
                            <th class="text-left px-6 py-3">Metode</th>
                            <th class="text-left px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pembayaran as $pay)
                            <tr class="border-t border-slate-100">
                                <td class="px-6 py-3 font-mono text-slate-900">#{{ $pay->id_pembayaran }}</td>
                                <td class="px-6 py-3">#{{ $pay->pemesanan->id_pemesanan ?? '-' }}</td>
                                <td class="px-6 py-3">{{ $pay->kasir->username ?? '-' }}</td>
                                <td class="px-6 py-3 text-slate-600">{{ $pay->metodePembayaran->nama_metode ?? '-' }}</td>
                                <td class="px-6 py-3">
                                    <span class="inline-flex items-center gap-2 rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-800 capitalize">
                                        <span class="size-1.5 rounded-full bg-indigo-500"></span>
                                        {{ str_replace('_', ' ', $pay->status_pembayaran) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="px-6 py-4 text-center text-slate-500">Belum ada pembayaran.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <section class="grid gap-6 lg:grid-cols-2">
        <div class="rounded-2xl border border-slate-200 bg-white shadow-lg">
            <div class="border-b border-slate-100 px-6 py-4">
                <h2 class="text-xl font-semibold text-slate-900">Transaksi & Nota</h2>
                <p class="text-sm text-slate-600">Transaksi selesai dengan info nota.</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-slate-500">
                        <tr>
                            <th class="text-left px-6 py-3">Kode</th>
                            <th class="text-left px-6 py-3">Total</th>
                            <th class="text-left px-6 py-3">Kode Nota</th>
                            <th class="text-left px-6 py-3">Kasir</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksi as $trx)
                            @php
                                $notaRow = $nota->firstWhere('id_transaksi', $trx->id_transaksi);
                            @endphp
                            <tr class="border-t border-slate-100">
                                <td class="px-6 py-3 font-mono text-slate-900">{{ $trx->kode_transaksi }}</td>
                                <td class="px-6 py-3">Rp{{ number_format($trx->total_harga, 0, ',', '.') }}</td>
                                <td class="px-6 py-3 text-slate-600">{{ $notaRow->kode_nota ?? '-' }}</td>
                                <td class="px-6 py-3">{{ $notaRow->kasir->username ?? '-' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="px-6 py-4 text-center text-slate-500">Belum ada transaksi.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white shadow-lg">
            <div class="border-b border-slate-100 px-6 py-4">
                <h2 class="text-xl font-semibold text-slate-900">Laporan</h2>
                <p class="text-sm text-slate-600">5 periode terakhir beserta jumlah detail.</p>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="text-slate-500">
                        <tr>
                            <th class="text-left px-6 py-3">Jenis</th>
                            <th class="text-left px-6 py-3">Periode</th>
                            <th class="text-left px-6 py-3">Jumlah Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporan as $report)
                            <tr class="border-t border-slate-100">
                                <td class="px-6 py-3 capitalize">{{ $report->jenis }}</td>
                                <td class="px-6 py-3 text-slate-600">{{ $report->periode_mulai }} &ndash; {{ $report->periode_selesai }}</td>
                                <td class="px-6 py-3">{{ $report->detail->count() }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="px-6 py-4 text-center text-slate-500">Belum ada laporan.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
