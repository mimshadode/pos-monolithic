@php($statusOptions = ['tersedia' => 'Tersedia', 'habis' => 'Habis'])
<div class="grid gap-4 md:grid-cols-2">
    <label class="text-sm space-y-1">
        <span class="text-slate-200">Kode Produk</span>
        <input type="text" name="kode_produk" value="{{ old('kode_produk', $produk->kode_produk ?? '') }}" class="w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-slate-100 shadow-inner shadow-white/5 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40">
        @error('kode_produk')
            <span class="text-xs text-rose-300">{{ $message }}</span>
        @enderror
    </label>
    <label class="text-sm space-y-1">
        <span class="text-slate-200">Nama Produk</span>
        <input type="text" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk ?? '') }}" class="w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-slate-100 shadow-inner shadow-white/5 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40">
        @error('nama_produk')
            <span class="text-xs text-rose-300">{{ $message }}</span>
        @enderror
    </label>
    <label class="text-sm space-y-1">
        <span class="text-slate-200">Harga</span>
        <input type="number" step="0.01" name="harga" value="{{ old('harga', $produk->harga ?? 0) }}" class="w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-slate-100 shadow-inner shadow-white/5 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40">
        @error('harga')
            <span class="text-xs text-rose-300">{{ $message }}</span>
        @enderror
    </label>
    <label class="text-sm space-y-1">
        <span class="text-slate-200">Stok</span>
        <input type="number" name="stok" value="{{ old('stok', $produk->stok ?? 0) }}" class="w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-slate-100 shadow-inner shadow-white/5 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40">
        @error('stok')
            <span class="text-xs text-rose-300">{{ $message }}</span>
        @enderror
    </label>
    <label class="text-sm space-y-1">
        <span class="text-slate-200">Kategori</span>
        <select name="id_kategori" class="w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-slate-100 shadow-inner shadow-white/5 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40">
            <option value="">Pilih kategori</option>
            @foreach ($kategori as $kat)
                <option value="{{ $kat->id_kategori }}" @selected(old('id_kategori', $produk->id_kategori ?? '') == $kat->id_kategori)>{{ $kat->nama_kategori }}</option>
            @endforeach
        </select>
        @error('id_kategori')
            <span class="text-xs text-rose-300">{{ $message }}</span>
        @enderror
    </label>
    <label class="text-sm space-y-1">
        <span class="text-slate-200">Status</span>
        <select name="status" class="w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-slate-100 shadow-inner shadow-white/5 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40">
            @foreach ($statusOptions as $value => $label)
                <option value="{{ $value }}" @selected(old('status', $produk->status ?? 'tersedia') == $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('status')
            <span class="text-xs text-rose-300">{{ $message }}</span>
        @enderror
    </label>
    <label class="text-sm space-y-1 md:col-span-2">
        <span class="text-slate-200">Deskripsi</span>
        <textarea name="deskripsi" rows="4" class="w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-slate-100 shadow-inner shadow-white/5 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40">{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
        @error('deskripsi')
            <span class="text-xs text-rose-300">{{ $message }}</span>
        @enderror
    </label>
</div>
<div class="flex justify-end gap-3 mt-6">
    <a href="{{ route('produk.index') }}" class="rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:border-white/30 hover:text-white">Batal</a>
    <button type="submit" class="rounded-xl bg-primary px-4 py-2 text-sm font-semibold text-slate-950 shadow-glow transition hover:-translate-y-0.5 hover:bg-primary/90">{{ $submitLabel }}</button>
</div>
