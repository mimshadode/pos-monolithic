@php($row = $item ?? ['id_produk' => '', 'qty' => 1, 'diskon' => 0, 'catatan' => ''])
<div class="grid gap-4 md:grid-cols-5 border border-white/10 rounded-2xl p-4 bg-white/5 shadow-inner shadow-white/5 item-row" data-index="{{ $index }}">
    <label class="text-sm space-y-1 md:col-span-2">
        <span class="text-slate-200">Produk</span>
        <select name="items[{{ $index }}][id_produk]" class="w-full rounded-xl border border-white/10 bg-slate-950/50 px-3 py-2 text-slate-100 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
            <option value="">Pilih produk</option>
            @foreach ($produk as $prod)
                <option value="{{ $prod->id_produk }}" @selected((string)($row['id_produk'] ?? '') === (string) $prod->id_produk)>
                    {{ $prod->nama_produk }} (Rp{{ number_format($prod->harga, 0, ',', '.') }})
                </option>
            @endforeach
        </select>
    </label>
    <label class="text-sm space-y-1">
        <span class="text-slate-200">Qty</span>
        <input type="number" min="1" name="items[{{ $index }}][qty]" value="{{ $row['qty'] ?? 1 }}" class="w-full rounded-xl border border-white/10 bg-slate-950/50 px-3 py-2 text-slate-100 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
    </label>
    <label class="text-sm space-y-1">
        <span class="text-slate-200">Diskon</span>
        <input type="number" min="0" step="0.01" name="items[{{ $index }}][diskon]" value="{{ $row['diskon'] ?? 0 }}" class="w-full rounded-xl border border-white/10 bg-slate-950/50 px-3 py-2 text-slate-100 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
    </label>
    <label class="text-sm space-y-1 md:col-span-2">
        <span class="text-slate-200">Catatan</span>
        <input type="text" name="items[{{ $index }}][catatan]" value="{{ $row['catatan'] ?? '' }}" class="w-full rounded-xl border border-white/10 bg-slate-950/50 px-3 py-2 text-slate-100 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30">
    </label>
    <div class="md:col-span-5 flex justify-end">
        <button type="button" class="remove-row text-rose-200 text-xs underline decoration-dotted hover:text-white">Hapus</button>
    </div>
</div>
