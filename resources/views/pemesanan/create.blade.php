@extends('layouts.app')

@section('title', 'Buat Pemesanan')
@section('layoutWidth', 'max-w-5xl')

@section('header')
    <div>
        <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Pemesanan</p>
        <h1 class="text-4xl font-semibold text-white">Buat Pemesanan</h1>
        <p class="text-slate-300">Isi detail pelanggan dan produk yang dipesan.</p>
    </div>
@endsection

@section('content')
    <section class="rounded-2xl border border-white/10 bg-slate-900/70 p-6 shadow-card space-y-6">
        <form method="POST" action="{{ route('pemesanan-web.store') }}" class="space-y-6">
            @csrf
            <label class="text-sm space-y-1 block">
                <span class="text-slate-200">Customer</span>
                <select name="id_user" class="w-full rounded-xl border border-white/10 bg-white/5 px-3 py-2 text-slate-100 shadow-inner shadow-white/5 focus:border-indigo-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/40">
                    <option value="">Pilih customer</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->id_user }}" @selected(old('id_user') == $customer->id_user)>
                            {{ $customer->username }} ({{ $customer->email }})
                        </option>
                    @endforeach
                </select>
                @error('id_user')
                    <span class="text-xs text-rose-300">{{ $message }}</span>
                @enderror
            </label>

            <div class="space-y-3">
                <div class="flex flex-wrap items-center justify-between gap-3">
                    <div>
                        <p class="text-lg font-semibold text-white">Item Pemesanan</p>
                        <p class="text-slate-300 text-sm">Tambahkan produk yang dibeli pelanggan.</p>
                    </div>
                    <button type="button" id="add-item" class="inline-flex items-center gap-2 rounded-xl bg-sky-500/90 px-4 py-2 text-sm font-semibold text-slate-950 shadow-sm transition hover:-translate-y-0.5 hover:bg-sky-400">
                        Tambah Item
                    </button>
                </div>
                @php($oldItems = old('items', [['id_produk' => '', 'qty' => 1, 'diskon' => 0, 'catatan' => '']]))
                @php($lastIndex = array_key_last($oldItems))
                <div id="items-container" class="space-y-4">
                    @foreach ($oldItems as $idx => $item)
                        @include('pemesanan._item_row', ['index' => $idx, 'item' => $item, 'produk' => $produk])
                    @endforeach
                </div>
                <input type="hidden" id="items-counter" value="{{ $lastIndex }}">
                @error('items')
                    <span class="text-xs text-rose-300">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('pemesanan-web.index') }}" class="rounded-xl border border-white/10 px-4 py-2 text-sm text-slate-200 transition hover:border-white/30 hover:text-white">Batal</a>
                <button type="submit" class="rounded-xl bg-primary px-4 py-2 text-sm font-semibold text-slate-950 shadow-glow transition hover:-translate-y-0.5 hover:bg-primary/90">Simpan Pemesanan</button>
            </div>
        </form>
    </section>

    @include('pemesanan._item_template')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const container = document.getElementById('items-container');
            const template = document.getElementById('item-template').innerHTML;
            const counterInput = document.getElementById('items-counter');
            const addButton = document.getElementById('add-item');

            function bindRemoveButtons() {
                container.querySelectorAll('.remove-row').forEach((btn) => {
                    btn.onclick = () => {
                        const rows = container.querySelectorAll('.item-row');
                        if (rows.length <= 1) {
                            alert('Minimal satu item diperlukan.');
                            return;
                        }
                        btn.closest('.item-row').remove();
                    };
                });
            }

            function addRow() {
                let current = parseInt(counterInput.value || '0', 10);
                current += 1;
                counterInput.value = current;
                const html = template.replace(/__INDEX__/g, current);
                const wrapper = document.createElement('div');
                wrapper.innerHTML = html.trim();
                container.appendChild(wrapper.firstElementChild);
                bindRemoveButtons();
            }

            addButton?.addEventListener('click', addRow);
            bindRemoveButtons();
        });
    </script>
@endsection
