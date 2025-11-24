@extends('layouts.app')

@section('title', 'Manajemen Role')
@section('layoutWidth', 'max-w-5xl')

@section('header')
    <div class="space-y-2">
        <p class="text-xs uppercase tracking-[0.2em] text-slate-400">POS Monolithic</p>
        <h1 class="text-4xl font-semibold text-white">CRUD Role</h1>
        <p class="text-slate-300 max-w-3xl">
            Kelola role inti (Admin, Kasir, Pelanggan) untuk mengendalikan akses aplikasi POS. Semua operasi dilakukan menggunakan Eloquent dan validasi server-side.
        </p>
        <div class="flex flex-wrap gap-3 text-sm text-slate-300">
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-1 rounded-lg px-3 py-1 transition hover:bg-white/5 hover:text-white">
                <span class="text-lg">←</span> Kembali ke Dashboard
            </a>
            <span class="text-slate-600">•</span>
            <a href="{{ url('/') }}" class="underline decoration-dotted decoration-slate-500 hover:text-white">Dokumentasi API</a>
        </div>
    </div>
@endsection

@section('content')
    <section class="rounded-2xl border border-white/10 bg-slate-900/70 p-6 shadow-card space-y-6">
        <header class="space-y-1">
            <h2 class="text-2xl font-semibold text-white">Tambah Role Baru</h2>
            <p class="text-slate-300 text-sm">Gunakan form ini ketika perlu menambah role selain Admin, Kasir, dan Pelanggan.</p>
        </header>

        <form method="POST" action="{{ route('roles.store') }}" class="grid gap-4 md:grid-cols-3">
            @csrf
            <label class="text-sm space-y-1">
                <span class="text-slate-200">Kode Role</span>
                <input type="text" name="kode_role" value="{{ old('kode_role') }}" class="w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-slate-100 shadow-inner shadow-white/5 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40" placeholder="mis. supervisor">
                @error('kode_role')
                    <span class="text-xs text-rose-300">{{ $message }}</span>
                @enderror
            </label>
            <label class="text-sm space-y-1">
                <span class="text-slate-200">Nama Role</span>
                <input type="text" name="nama_role" value="{{ old('nama_role') }}" class="w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-slate-100 shadow-inner shadow-white/5 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40" placeholder="Supervisor Operasional">
                @error('nama_role')
                    <span class="text-xs text-rose-300">{{ $message }}</span>
                @enderror
            </label>
            <label class="text-sm space-y-1 md:col-span-3">
                <span class="text-slate-200">Keterangan (opsional)</span>
                <textarea name="keterangan" rows="2" class="w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-slate-100 shadow-inner shadow-white/5 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40" placeholder="Deskripsi singkat">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <span class="text-xs text-rose-300">{{ $message }}</span>
                @enderror
            </label>
            <div class="md:col-span-3 flex justify-end">
                <button type="submit" class="inline-flex items-center gap-2 rounded-xl bg-primary px-4 py-2 text-sm font-semibold text-slate-900 shadow-glow transition hover:-translate-y-0.5 hover:bg-primary/90">
                    Simpan Role
                </button>
            </div>
        </form>
    </section>

    <section class="rounded-2xl border border-white/10 bg-slate-900/70 shadow-card">
        <div class="border-b border-white/5 px-6 py-4">
            <h2 class="text-2xl font-semibold text-white">Daftar Role</h2>
            <p class="text-slate-300 text-sm">Perbarui atau hapus role yang ada.</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="text-slate-400">
                    <tr>
                        <th class="text-left px-6 py-3">Kode</th>
                        <th class="text-left px-6 py-3">Nama</th>
                        <th class="text-left px-6 py-3">Keterangan</th>
                        <th class="text-left px-6 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $role)
                        <tr class="border-t border-white/5">
                            <td class="px-6 py-4 font-mono uppercase text-slate-100">{{ $role->kode_role }}</td>
                            <td class="px-6 py-4">{{ $role->nama_role }}</td>
                            <td class="px-6 py-4 text-slate-400">{{ $role->keterangan }}</td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-3">
                                    <form method="POST" action="{{ route('roles.update', $role) }}" class="flex flex-wrap items-center gap-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="kode_role" value="{{ old('kode_role', $role->kode_role) }}" class="w-28 rounded-lg border border-white/10 bg-white/5 px-2 py-1 text-xs text-slate-100 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
                                        <input type="text" name="nama_role" value="{{ old('nama_role', $role->nama_role) }}" class="w-32 rounded-lg border border-white/10 bg-white/5 px-2 py-1 text-xs text-slate-100 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
                                        <input type="text" name="keterangan" value="{{ old('keterangan', $role->keterangan) }}" class="w-40 rounded-lg border border-white/10 bg-white/5 px-2 py-1 text-xs text-slate-100 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
                                        <button class="rounded-lg bg-sky-500/90 px-3 py-1 text-xs font-semibold text-slate-950 shadow-sm transition hover:-translate-y-0.5 hover:bg-sky-400" type="submit">
                                            Update
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('roles.destroy', $role) }}" onsubmit="return confirm('Hapus role ini?')" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded-lg bg-rose-500/80 px-3 py-1 text-xs font-semibold text-slate-950 shadow-sm transition hover:-translate-y-0.5 hover:bg-rose-400" type="submit">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-6 text-center text-slate-500">Belum ada role yang tersimpan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
